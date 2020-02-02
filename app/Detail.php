<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table ="detail";
    protected $primarykey="id_detail";
    protected $fillable =[
        'id_detail',
        'id_peminjaman',
        'id_buku',
        'qty',
    ];
    public $timestamps =false;
}
