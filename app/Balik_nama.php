<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balik_nama extends Model
{
    protected $table = 'balik_nama';
     protected $fillable = [ 'tgl_pengajuan', 'jenis_pengajuan', 'syarat_ktp','syarat_kk','syarat_sppt','syarat_surat_tanah','biaya_pembuatan','jenis_pembayaran'];   
}