<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
     protected $table = 'penyewa';
     protected $fillable = ['nama', 'telp','alamat','jml_sewa','keterangan'];   
}