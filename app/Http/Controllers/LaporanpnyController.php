<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class LaporanpnyController extends Controller
{
    public function index()
    {
        
        return view('lppny.index');
    }

    public function detail(Request $request)
    {

        // dd($request);
        $tampil = DB::table('sewa')
        ->Join('user', 'sewa.id_user', '=', 'user.id_user')
        ->leftJoin('kembali', 'user.id_user', '=', 'kembali.id_user')
        ->leftJoin('detail_kembali', 'kembali.no_kembali', '=', 'detail_kembali.no_kembali')
        ->Join('detail_sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
        ->where('sewa.tgl_transaksi', '>=', "'$request->tglaw'")
        // ->where('sewa.tgl_transaksi', '<=', "'$request->tglak'")
        ->get();
        if ($request->tombol == 'export') {
            $data = [
                'title' => 'Laporan Penyewaan Periode',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lppny.export', $data);
    
            return $pdf->download('laporan_penyewaan_periode.pdf');
        }

        return view('lppny.detail',compact('tampil'));
    }
    public function bulan(Request $request)
    {
        $tglaw = date('Y-'.$request->tglaw.'-01');
        $tglak = date('Y-'.$request->tglak.'-30');
        // dd($tglaw,$request->tglaw);

        $tampil = DB::table('sewa')
        ->Join('user', 'sewa.id_user', '=', 'user.id_user')
        ->Join('detail_sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
        ->leftJoin('kembali', 'user.id_user', '=', 'kembali.id_user')
        ->leftJoin('detail_kembali', 'kembali.no_kembali', '=', 'detail_kembali.no_kembali')
        ->where('sewa.tgl_transaksi', '>=', "'$tglaw'")
        // ->where('sewa.tgl_transaksi', '<=', "'$tglak'")
        ->get();
        
        if ($request->tombol == 'export') {
            $data = [
                'title' => 'Laporan Penyewaan Bulanan',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lppny.export', $data);
    
            return $pdf->download('laporan_penyewaan_bulanan.pdf');
        }
        
        return view('lppny.bulan',compact('tampil'));
    }
    public function tahun(Request $request)
    {
        $tglaw = date($request->tahun.'-m-01');
        $tglak = date($request->tahun.'-12-30');
        // dd($tglaw,$tglak);
        $tampil = DB::table('sewa')
        ->Join('user', 'sewa.id_user', '=', 'user.id_user')
        ->Join('detail_sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
        ->leftJoin('kembali', 'user.id_user', '=', 'kembali.id_user')
        ->leftJoin('detail_kembali', 'kembali.no_kembali', '=', 'detail_kembali.no_kembali')
        ->where('sewa.tgl_transaksi', '>=', "'$tglaw'")
        // ->where('sewa.tgl_transaksi', '<=', "'$tglak'")
        ->get();

        if ($request->tombol == 'export') {
            $data = [
                'title' => 'Laporan Penyewaan Tahunan',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lppny.export', $data);
    
            return $pdf->download('laporan_penyewaan_tahunan.pdf');
        }

        return view('lppny.tahun',compact('tampil'));
    }

    
}
