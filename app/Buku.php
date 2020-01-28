<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table ="buku";
    protected $primarykey="id_buku";
    protected $fillable =[
        'id_buku',
        'judul',
        'penerbit',
        'pengarang',
        'foto',
    ];
    public $timestamps =false;
}
