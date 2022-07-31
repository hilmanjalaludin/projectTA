<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class TrsjurnalController extends Controller
{
    public function index()
    {
        $tampil1 = DB::table('jurnal')
            ->Join('detail_jurnal', 'detail_jurnal.no_jurnal', '=', 'jurnal.no_jurnal')
            ->leftJoin('perkiraan', 'detail_jurnal.kd_perkiraan', '=', 'perkiraan.kd_perkiraan')
            ->get();
        $tampil2 = DB::table('jurnal')
            ->Join('detail_jurnal', 'detail_jurnal.no_jurnal', '=', 'jurnal.no_jurnal')
            ->leftJoin('perkiraan', 'detail_jurnal.kd_perkiraan', '=', 'perkiraan.kd_perkiraan')
            ->get();

        return view('trsjurnal.index', compact('tampil1', 'tampil2'));
    }

    public function detail(Request $request)
    {
        // dd($request);
        $tampil = DB::table('jurnal')
            ->Join('detail_jurnal', 'detail_jurnal.no_jurnal', '=', 'jurnal.no_jurnal')
            ->get();

        return view('trsjurnal.detail', compact('tampil'));
    }

    public function store(Request $request)
    {
        $penyewa = DB::table('jurnal')
        ->where('no_jurnal', $request->no_jurnal)
        ->count();
        // dd($penyewa);
        if ($penyewa >0) {
            // return redirect()->back()->withSuccess('Data berhasil');
            return redirect()->back()->with('error','No Jurnal sudah ada');
        }


        DB::table('jurnal')->insert(
            [
                'no_jurnal' => $request->no_jurnal,
                'tanggal' => $request->tanggal,
            ]
        );


        DB::table('detail_jurnal')->insert(
            [
                'no_jurnal' => $request->no_jurnal,
                'no_trans' => $request->no_trans,
                'nama_trans' => $request->nama_trans,
                'kd_perkiraan' => $request->kd_perkiraan,
                'debet' => $request->debet,

            ]
        );

        return redirect()->back()->withSuccess('Data berhasil');
    }
}
