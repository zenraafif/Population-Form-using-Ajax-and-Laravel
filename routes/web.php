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

Route::get('/register', 'formController@xml_get_current_byte_index(parser)');

Route::get('register/fetch', 'formController@fetch')->name('register.fetch');











Route::get('/provinsi', 'ApiController@provinsi');
Route::get('/kota/provinsi/{id_provinsi}', 'ApiController@kotaProvinsi');

Route::get('/kota', 'ApiController@kota');
Route::get('/kecamatan/kota/{id_kota}', 'ApiController@kecamatanKota');

Route::get('/kecamatan', 'ApiController@kecamatan');
Route::get('kelurahan/kecamatan/{id_kecamatan}', 'ApiController@kelurahanKecamatan');

Route::get('/kelurahan', 'ApiController@kelurahan');

Route::post('/tambahPenduduk', 'formController@tambahPenduduk');

Route::get('/penduduk', 'formController@tampilkanPenduduk');

Route::post('/edit-penduduk', 'formController@editPenduduk');

Route::post('/hapus-penduduk', 'formController@hapusPenduduk');

Route::delete('/user/delete/{id}', 'formController@destroy');

Route::post('/user/edit/{id}', 'formController@editPenduduk');



Route::match(['get', 'post'], 'ajax-image-upload', 'profileController@ajaxImage');
Route::delete('ajax-remove-image/{filename}', 'profileController@deleteImage');