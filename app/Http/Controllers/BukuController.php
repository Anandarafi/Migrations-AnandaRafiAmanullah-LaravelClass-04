<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang'=> 'required',
            'foto' => 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $buku = Buku::create([
            'judul' => $req->judul,
            'penerbit' => $req->penerbit,
            'pengarang'=> $req->pengarang,
            'foto'=> $req->foto,
        ]);
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang'=> 'required',
            'foto' => 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $buku=Buku::where('id_buku',$id)->update([
            'judul' => $req->judul,
            'penerbit' => $req->penerbit,
            'pengarang'=> $req->pengarang,
            'foto'=> $req->foto,
        ]);
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $buku=Buku::where('id_buku',$id)->delete();
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $buku=Buku::all();
        if($buku){
            return Response()->json(['Data'=>$buku,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
