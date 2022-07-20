<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
     protected $table = 'kembali';
     protected $fillable = [ 'tgl_trans','jmlh_mobil','total_bayar','status_kembali','no_sewa','id_user'];   
}