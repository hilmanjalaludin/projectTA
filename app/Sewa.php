<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
     protected $table = 'sewa';
     protected $fillable = ['tgl_transaksi', 'jml_mobil','dp','kurang','status_sewa','nik','id_user'];   
}