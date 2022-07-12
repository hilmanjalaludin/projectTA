<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporanjr extends Model
{
        protected $table = 'jurnal';
    protected $fillable = [ 'tgl_jurnal', 'no_reff', 'keterangan'];   
}