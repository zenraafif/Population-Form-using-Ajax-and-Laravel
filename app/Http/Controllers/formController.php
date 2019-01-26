<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Response;
use Validator;
use DB;
use App\Http\Requests\TestRequest;


class formController extends Controller
{

    public function tambahPenduduk(Request $request){
        $rules = [
                'nama' => 'required|unique:penduduk|max:25',
                'nik' => 'required|min:5|max:25',
                'no_kk' => 'required|min:5|max:25',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat_lengkap' => 'required',
            ];

        $customMessages = [
            'required' => 'Harap isi :attribute',
            'unique' => ':attribute sudah dipakai',
            'max' => ':attribute maksimal',
            'min' => ':attribute minimal',
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->ajax()){



           // $gambar          = Request::input('gambar');        
           // $nama            = Request::input('nama');
           // $tempat_lahir    = Request::input('tempat_lahir');
           // $tanggal_lahir   = Request::input('tanggal_lahir');
           // $jenis_kelamin   = Request::input('jenis_kelamin');
           // $provinsi        = Request::input('provinsi');
           // $kota            = Request::input('kota');
           // $kecamatan       = Request::input('kecamatan');
           // $kelurahan       = Request::input('kelurahan');
           // $alamat_lengkap  = Request::input('alamat_lengkap');
           // $nik             = Request::input('nik');
           // $no_kk           = Request::input('no_kk');

         $gambar = $request->gambar;
         $nama = $request->nama;
         $nik = $request->nik;
         $no_kk = $request->no_kk;
         $tempat_lahir = $request->tempat_lahir;
         $tanggal_lahir = $request->tanggal_lahir;
         $jenis_kelamin = $request->jenis_kelamin;
         $provinsi = $request->provinsi;
         $kota = $request->kota;
         $kecamatan = $request->kecamatan;
         $kelurahan = $request->kelurahan;
         $alamat_lengkap = $request->alamat_lengkap;

         $save['gambar']          = $gambar;   
         $save['nama']            = $nama;   
         $save['nik']             = $nik;   
         $save['no_kk']           = $no_kk;   
         $save['tempat_lahir']    = $tempat_lahir; 
         $save['tanggal_lahir']   = $tanggal_lahir;   
         $save['jenis_kelamin']   = $jenis_kelamin;
         $save['id_provinsi']     = $provinsi;
         $save['id_kota']         = $kota;
         $save['id_kecamatan']    = $kecamatan;
         $save['id_kelurahan']    = $kelurahan;
         $save['alamat']          = $alamat_lengkap;


         $action = DB::table('penduduk')->insert($save);
         return response()->json(['responseText' => 'Success!'], 200);
     }

 }

 public function tampilkanPenduduk(Request $request) {
    $penduduks = \App\penduduk::all();

    $arr['penduduks'] = $penduduks;

    $post = \App\penduduk::paginate(10);

    return view('penduduk', compact('post'), $arr);
}
public function editPenduduk(Request $request, $id)
{   
    $data = \App\Penduduk::findOrFail($id);
    $data->gambar = $request->gambar;  
    $data->nama = $request->nama;
    $data->nik = $request->nik;
    $data->no_kk = $request->no_kk;
    $data->tempat_lahir = $request->tempat_lahir;
    $data->tanggal_lahir = $request->tanggal_lahir;
    $data->jenis_kelamin = $request->jenis_kelamin;
    $data->alamat = $request->alamat_lengkap;
    $data->save();
    return response()->json($data);
}
public function hapusPenduduk(Request $req)
{
    Penduduk::find($req->id)->delete();
    return response()->json();
}


public function Register(){
    return view('register');           
}

public function destroy($id)
{   $deleted =  \App\Penduduk::find($id)->delete();

    return response()->json();
}






public function index()
{
   $provinsis = \App\Provinsi::all();
   return view('register')->with('provinsis', $provinsis);
}

public function fetch(Request $request)
{
   $select = $request->get('select');
   $value = $request->get('value');
   $dependent = $request->get('dependent');
   $data = DB::table('country_state_city')
   ->where($select, $value)
   ->groupBy($dependent)
   ->get();
   $output = '<option value="">Select '.ucfirst($dependent).'</option>';
   foreach($data as $row)
   {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
  }
  echo $output;
}

}
