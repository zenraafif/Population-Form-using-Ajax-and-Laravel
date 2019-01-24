<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Support\Facades\Input;
use Request;
use Response;
use DB;

class formController extends Controller
{

        public function tambahPenduduk(){

           $gambar          = Request::input('gambar');        
           $nama            = Request::input('nama');
           $tempat_lahir    = Request::input('tempat_lahir');
           $tanggal_lahir   = Request::input('tanggal_lahir');
           $jenis_kelamin   = Request::input('jenis_kelamin');
           $provinsi        = Request::input('provinsi');
           $kota            = Request::input('kota');
           $kecamatan       = Request::input('kecamatan');
           $kelurahan       = Request::input('kelurahan');
           $alamat_lengkap  = Request::input('alamat_lengkap');
           $nik             = Request::input('nik');
           $no_kk           = Request::input('no_kk');

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

        }

        public function tampilkanPenduduk(Request $request) {
            $penduduks = \App\penduduk::all();

            $arr['penduduks'] = $penduduks;
            return view ( 'penduduk', $arr );
        }
        public function editPenduduk(Request $req, $id)
            {   
                $data = \App\Penduduk::findOrFail($id);
                $data->nama = Request::input('nama');
                $data->nik = Request::input('nik');
                $data->no_kk = Request::input('no_kk');
                $data->tempat_lahir = Request::input('tempat_lahir');
                $data->tanggal_lahir = Request::input('tanggal_lahir');
                $data->jenis_kelamin = Request::input('jenis_kelamin');
                $data->alamat = Request::input('alamat');
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
