<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPrk extends Model
{
     protected $table = 'perkiraan';
    protected $fillable = [ 'jns_perkiraan', 'nm_perkiraan'];   
}