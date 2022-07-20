<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
     protected $table = 'mobil';
     protected $fillable = [ 'jenis', 'type','warna','tahun','no_polisi','no_rangka','no_mesin','biaya','status'];   
}