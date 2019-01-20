<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class formController extends Controller
{
        
        public function Register(){
            return view('register');           
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
