<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporanbayar extends Model
{
        protected $table = 'pembayaran';
    protected $fillable = [ 'no_pengajuan', 'tgl_pembayaran', 'jumlah_pembayaran','keterangan'];   
}