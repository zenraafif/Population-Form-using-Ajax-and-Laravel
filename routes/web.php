<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/asd', 'formController@Register');


Route::get('myform', 'formController@myform');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'formController@selectAjax']);

Route::get('/register', 'formController@index');

Route::get('register/fetch', 'formController@fetch')->name('register.fetch');



Route::get('/provinsi', 'ApiController@provinsi');
Route::get('/kota/provinsi/{id_provinsi}', 'ApiController@kotaProvinsi');
Route::get('/kota', 'ApiController@kota');
Route::get('/kecamatan/kota/{id_kota}', 'ApiController@kecamatanKota');
Route::get('/kecamatan', 'ApiController@kecamatan');
Route::get('/kelurahan', 'ApiController@kelurahan');