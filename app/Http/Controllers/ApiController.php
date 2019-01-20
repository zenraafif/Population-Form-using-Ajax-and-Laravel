<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function provinsi(){
    	return \App\Provinsi::all()->toJson();
    }

    public function kota(){
    	return \App\Kota::all()->toJson();
    }

    public function kecamatan(){
    	return \App\Kecamatan::all()->toJson();
    }

    public function kelurahan(){
    	return \App\Kelurahan::all()->toJson();
    }

    public function kotaProvinsi($id_provinsi){
    	return \App\Kota::where('id_provinsi', $id_provinsi)->get()->toJson();
    }
    public function kecamatanKota($id_kota){
    	return \App\Kecamatan::where('id_kota', $id_kota)->get()->toJson();
    }
}
