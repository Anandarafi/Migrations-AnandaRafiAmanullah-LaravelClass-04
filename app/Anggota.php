<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table ="anggota";
    protected $primarykey="id_anggota";
    public $timestamps =false;
}