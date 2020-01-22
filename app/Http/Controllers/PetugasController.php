<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class PetugasController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }


    public function getAuthenticatedUser()
    {
        try {

            if (! $petugas = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('petugas'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'nama_petugas' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp'=> 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|max:25',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $petugas = User::create([
            'nama_petugas' => $request->get('nama_petugas'),
            'alamat' =>  $request->get('alamat'),
            'telp'=>  $request->get('telp'),
            'username'=>  $request->get('username'),
            'password'=>  Hash::make($request->get('password')),
            'level'=>  $request->get('level'),
        ]);

        $token = JWTAuth::fromUser($petugas);
        
        return response()->json(compact('petugas','token'),201);
    }

    public function update($id, Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'nama_petugas' => 'required',
            'alamat' => 'required',
            'telp'=> 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $petugas=User::where('id_petugas',$id)->update([
            'nama_petugas' => $request->nama_petugas,
            'alamat' => $request->alamat,
            'telp'=> $request->telp,
            'username'=> $request->username,
            'password'=> $request->password,
            'level'=> $request->level,
        ]);
        if($petugas){
            return Response()->json(['status'=>1,'message'=>'Data Petugas berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Petugas tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $petugas=User::where('id_petugas',$id)->delete();
        if($petugas){
            return Response()->json(['status'=>1,'message'=>'Data Petugas berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Petugas tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $petugas=User::all();
        if($petugas){
            return Response()->json(['Data'=>$petugas,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }

 
}
