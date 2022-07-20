<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
     protected $table = 'kondisi';
     protected $fillable = ['kd_mobil', 'bensin','kilometer','depan','belakang','kanan','kiri'];   
}