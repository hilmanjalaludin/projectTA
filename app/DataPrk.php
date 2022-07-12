<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPrk extends Model
{
     protected $table = 'perkiraan';
    protected $fillable = [ 'nama_akun', 'jenis_akun', 'saldo_normal'];   
}