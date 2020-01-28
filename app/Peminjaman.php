<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table ="peminjaman";
    protected $primarykey="id_peminjaman";
    protected $fillable =[
        'id_peminjaman',
        'tgl_pinjam',
        'id_anggota',
        'id_petugas',
        'tgl_tempo',
        'denda',
    ];
    public $timestamps =false;
}

