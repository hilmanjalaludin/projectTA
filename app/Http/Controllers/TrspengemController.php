<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class TrspengemController extends Controller
{
    public function index()
    {
        $dtl_sewa = DB::table('detail_sewa')
            ->get();
        $kembali = DB::table('detail_sewa')
            ->Join('sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
            ->get();

        $tampil = DB::table('detail_sewa')
            ->Join('sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
            ->Join('mobil', 'mobil.kd_mobil', '=', 'detail_sewa.kd_mobil')
            ->get();
        // dd($tampil);
        $pilih_mobil = DB::table('detail_sewa')
            ->Join('mobil', 'mobil.kd_mobil', '=', 'detail_sewa.kd_mobil')
            ->Join('kondisi', 'mobil.kd_mobil', '=', 'kondisi.kd_mobil')
            ->get();

        $tbl_kedua = DB::table('detail_sewa')
            ->Join('mobil', 'mobil.kd_mobil', '=', 'detail_sewa.kd_mobil')
            ->Join('kondisi', 'mobil.kd_mobil', '=', 'kondisi.kd_mobil')
            ->Join('kembali', 'detail_sewa.no_sewa', '=', 'kembali.no_sewa')
            ->Join('detail_kembali', 'kembali.no_kembali', '=', 'detail_kembali.no_kembali')
            ->get();
        return view('trspengem.index', compact('tampil', 'dtl_sewa', 'kembali', 'pilih_mobil', 'tbl_kedua'));
    }

    public function detail(Request $request)
    {
        // dd($request);
        $tampil = DB::table('user')
            ->Join('jurnal', 'user.id_user', '=', 'jurnal.id_user')
            ->where('jurnal.id_user', $request->id_user)
            ->get();

        return view('trspengem.detail', compact('tampil'));
    }

    public function store(Request $request)
    {
        // dd($request);


        DB::table('sewa')->insert(
            [
                'no_sewa' => $request->no_sewa,
                'tgl_transaksi' => $request->tgl_transaksi,
                'nik' => $request->nik,
                'dp' => $request->dp,
            ]
        );

        DB::table('detail_sewa')->insert(
            [
                'no_sewa' => $request->no_sewa,
                'kd_mobil' => $request->kd_mobil,
                'tgl_sewa' => $request->tgl_sewa,
                'tgl_kembali' => $request->tgl_kembali,
                'jam_kembali' => $request->jam_kembali,
            ]
        );

        DB::table('penyewa')->insert(
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
            ]
        );
        DB::table('kembali')->insert(
            [
                'total_bayar' => $request->total_bayar,
                'no_sewa' => $request->no_sewa,
            ]
        );

        return redirect()->back()->withSuccess('Data berhasil');
    }
}