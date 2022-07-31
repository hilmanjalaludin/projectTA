<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
use PDF;
class LaporanpengemController extends Controller
{
    public function index()
    {
        $tampil = DB::table('user')
                ->Join('jurnal', 'user.id_user', '=', 'jurnal.id_user')
                ->get('user.*');
                // dd($tampil);
        return view('lppengem.index', compact('tampil'));
    }

    public function detail(Request $request)
    {
        // dd($request);
        $tampil = DB::table('sewa')
        ->Join('user', 'sewa.id_user', '=', 'user.id_user')
        ->Join('detail_sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
        ->leftJoin('kembali', 'user.id_user', '=', 'kembali.id_user')
        ->leftJoin('detail_kembali', 'kembali.no_kembali', '=', 'detail_kembali.no_kembali')
        ->where('sewa.tgl_transaksi', '>=', "'$request->tglaw'")
        // ->where('sewa.tgl_transaksi', '<=', "'$request->tglak'")
        ->get();

        if ($request->tombol == 'export') {
            $data = [
                'title' => 'Laporan Pengembalian Periode',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lppengem.export', $data);
    
            return $pdf->download('laporan_pengembalian_periode.pdf');
        }

        return view('lppengem.detail',compact('tampil'));
    }
    public function bulan(Request $request)
    {
        // dd($request);
        $tglaw = date('Y-"'.$request->tglaw.'"-01');
        $tglak = date('Y-"'.$request->tglak.'"-30');
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
                'title' => 'Laporan Pengembalian Perbulan',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lppengem.export', $data);
    
            return $pdf->download('laporan_pengembalian_perbulan.pdf');
        }

        return view('lppengem.bulan',compact('tampil'));
    }
    public function tahun(Request $request)
    {
        $tglaw = date($request->tahun.'-m-01');
        $tglak = date($request->tahun.'-12-30');
        // dd($request);
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
                'title' => 'Laporan Pengembalian Tahunan',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lppengem.export', $data);
    
            return $pdf->download('laporan_pengembalian_tahunan.pdf');
        }

        return view('lppengem.tahun',compact('tampil'));
    }



}
