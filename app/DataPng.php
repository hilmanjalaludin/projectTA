<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPng extends Model
{
     protected $table = 'user';
    protected $fillable = [ 'name', 'Password', 'hak_akses','no_ktp','jenkel','telpon','almt'];   
}