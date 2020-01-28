<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table ="anggota";
    protected $primarykey="id_anggota";
    protected $fillable =[
        'id_anggota',
        'nama_anggota',
        'telp',
        'alamat',
    ];
    public $timestamps =false;
}
