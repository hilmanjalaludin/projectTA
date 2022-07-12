<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPng extends Model
{
     protected $table = 'pengguna';
    protected $fillable = [ 'nama_pengguna', 'Password', 'hak_akses'];   
}