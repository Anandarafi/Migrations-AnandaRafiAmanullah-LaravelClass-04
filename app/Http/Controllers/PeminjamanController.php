<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Detail;

class PeminjamanController extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'tgl_pinjam' => 'required',
            'id_anggota'=> 'required',
            'id_petugas'=> 'required',
            'tgl_tempo'=> 'required',
            'denda'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $peminjaman = Peminjaman::create([
            'tgl_pinjam' => $req->tgl_pinjam,
            'id_anggota'=> $req->id_anggota,
            'id_petugas'=> $req->id_petugas,
            'tgl_tempo'=> $req->tgl_tempo,
            'denda'=> $req->denda,
        ]);
        if($peminjaman){
            return Response()->json(['status'=>1,'message'=>'Data Peminjaman berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Peminjaman tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'tgl_pinjam' => 'required',
            'id_anggota' => 'required',
            'id_petugas'=> 'required',
            'tgl_tempo' => 'required',
            'denda' => 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $peminjaman=Peminjaman::where('id_peminjaman',$id)->update([
            'tgl_pinjam' => $req->tgl_pinjam,
            'id_anggota' => $req->id_anggota,
            'id_petugas'=> $req->id_petugas,
            'tgl_tempo'=> $req->tgl_tempo,
            'denda'=> $req->denda,
        ]);
        if($peminjaman){
            return Response()->json(['status'=>1,'message'=>'Data Peminjaman berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Peminjaman tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $peminjaman=Peminjaman::where('id_peminjaman',$id)->delete();
        if($peminjaman){
            return Response()->json(['status'=>1,'message'=>'Data Peminjaman berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Peminjaman tidak berhasil dihapus']);
        }
    }
    public function tampil($id)
    {
       $peminjaman = Peminjaman::join('anggota','anggota.id_anggota','peminjaman.id_anggota')->join('users','users.id_petugas','peminjaman.id_petugas')->where('id_peminjaman',$id)->first();
        $detail=Detail::where('id_peminjaman',$peminjaman->id_peminjaman)->get();
        $arr_detail=array();
        $arr_data=array();
        $data=array();
            foreach($detail as $detail){
                $arr_detail[]=array(
                    'id_detail' => $detail->id_detail,
                    'id_peminjaman' => $detail->id_peminjaman,
                    'id_buku'=> $detail->id_buku,
                    'qty'=> $detail->qty,
                );
   
            }
           $arr_data=array(
                'id_anggota'=> $peminjaman->id_anggota,
                'nama_anggota'=> $peminjaman->nama_anggota,
                'id_petugas'=> $peminjaman->id_petugas,
                'nama_petugas'=> $peminjaman->nama_petugas,
                'Tgl_pinjam'=> $peminjaman->tgl_pinjam,
                'Tgl_tempo'=> $peminjaman->tgl_tempo,
                'denda'=> $peminjaman->denda,
                'Detail'=> $arr_detail,
        );
        $data=array(
            'Data'=>$arr_data
        );
        
        return Response()->json([$data]);
    }


    //DETAILCONTROLLER//
    public function store1(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_peminjaman' => 'required',
            'id_buku'=> 'required',
            'qty'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $detail = Detail::create([
            'id_peminjaman' => $req->id_peminjaman,
            'id_buku'=> $req->id_buku,
            'qty'=> $req->qty,
        ]);
        if($detail){
            return Response()->json(['status'=>1,'message'=>'Data Detail Peminjaman berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Detail Peminjaman tidak berhasil ditambahkan!']);
        }
    }
    public function update1($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_peminjaman' => 'required',
            'id_buku'=> 'required',
            'qty'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $detail=Detail::where('id_detail',$id)->update([
            'id_peminjaman' => $req->id_peminjaman,
            'id_buku'=> $req->id_buku,
            'qty'=> $req->qty,
        ]);
        if($detail){
            return Response()->json(['status'=>1,'message'=>'Data Detail Peminjaman berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Detail Peminjaman tidak berhasil diubah']);
        }
    }

    public function delete1($id)
    {
        $detail=Detail::where('id_detail',$id)->delete();
        if($detail){
            return Response()->json(['status'=>1,'message'=>'Data Detail Peminjaman berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Detail Peminjaman tidak berhasil dihapus']);
        }
    }
    public function tampil1()
    {
        $detail=Detail::all();
        if($detail){
            return Response()->json(['Data'=>$detail,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
