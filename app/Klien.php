<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
     protected $fillable = [ 'nama _klien', 'nik_klien', 'tempat_lahir_klien' ];   
}