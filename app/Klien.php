<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
     	protected $table = 'klien';
     protected $fillable = [ 'id_klien','nama_klien', 'nik_klien', 'tempat_lahir_klien'];   
     // protected $fillable = [ 'nama_klien', 'nik_klien', 'tempat_lahir_klien','tgl_lahir_klien','jenis_kelamin_klien','pekerjaan_klien','nlamat_klien','no_tlp_klien' ];   
//      protected $table = 'companies';
//    protected $fillable = [ 'name', 'email', 'address' ];   
}