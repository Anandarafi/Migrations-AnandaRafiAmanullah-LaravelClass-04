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
Route::get('/',function(){
    return Auth::user()->level;
})->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                         LOGIN PETUGAS TATIB                           |
|-----------------------------------------------------------------------|
*/
Route::post('login','PetugasController@login');
Route::get('/login/check', 'PetugasController@getAuthenticatedUser')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                            CRUD ANGGOTA                               |
|-----------------------------------------------------------------------|
*/
Route::post('anggota','AnggotaController@store')->middleware('jwt.verify');
Route::put('anggota/{id}','SiswaController@update')->middleware('jwt.verify');
Route::delete('anggota/{id}','AnggotaController@delete')->middleware('jwt.verify');
Route::get('anggota','AnggotaController@tampil')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                              CRUD BUKU                                |
|-----------------------------------------------------------------------|
*/
Route::post('buku','BukuController@store')->middleware('jwt.verify');
Route::put('buku/{id}','BukuController@update')->middleware('jwt.verify');
Route::delete('buku/{id}','BukuController@delete')->middleware('jwt.verify');
Route::get('buku','BukuController@tampil')->middleware('jwt.verify');

/*
|-----------------------------------------------------------------------|
|                            CRUD PETUGAS                               |
|-----------------------------------------------------------------------|
*/
Route::post('petugas','PetugasController@store');
Route::put('petugas/{id}','PetugasController@update');
Route::delete('petugas/{id}','PetugasController@delete');
Route::get('petugas','PetugasController@tampil');