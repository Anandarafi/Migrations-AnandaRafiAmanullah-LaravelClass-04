<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|-----------------------------------------------------------------------|
|                               SEARCH                                  |
|-----------------------------------------------------------------------|
*/
//Route::get('/',function(){
    //return Auth::user()->level;
//})->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                         LOGIN PETUGAS TATIB                           |
|-----------------------------------------------------------------------|
*/
Route::post('login','PetugasController@login');
Route::get('/login/check', 'PetugasController@getAuthenticatedUser');

/*
|-----------------------------------------------------------------------|
|                            CRUD ANGGOTA                               |
|-----------------------------------------------------------------------|
*/
Route::post('anggota','AnggotaController@store');
Route::put('anggota/{id}','AnggotaController@update');
Route::delete('anggota/{id}','AnggotaController@delete');
Route::get('anggota','AnggotaController@tampil');

/*
|-----------------------------------------------------------------------|
|                              CRUD BUKU                                |
|-----------------------------------------------------------------------|
*/
Route::post('buku','BukuController@store');
Route::put('buku/{id}','BukuController@update');
Route::delete('buku/{id}','BukuController@delete');
Route::get('buku','BukuController@tampil');

/*
|-----------------------------------------------------------------------|
|                            CRUD PETUGAS                               |
|-----------------------------------------------------------------------|
*/
Route::post('petugas','PetugasController@store');
Route::put('petugas/{id}','PetugasController@update');
Route::delete('petugas/{id}','PetugasController@delete');
Route::get('petugas','PetugasController@tampil');