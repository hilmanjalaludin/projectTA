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
        $notrans = DB::table('sewa')
            ->Join('penyewa', 'penyewa.nik', '=', 'sewa.nik')
            ->select('no_sewa','nama')
            ->get();

        $tampil1 = DB::table('jurnal')
            ->Join('detail_jurnal', 'detail_jurnal.no_jurnal', '=', 'jurnal.no_jurnal')
            ->leftJoin('perkiraan', 'detail_jurnal.kd_perkiraan', '=', 'perkiraan.kd_perkiraan')
            ->get();
        $tampil2 = DB::table('jurnal')
            ->Join('detail_jurnal', 'detail_jurnal.no_jurnal', '=', 'jurnal.no_jurnal')
            ->leftJoin('perkiraan', 'detail_jurnal.kd_perkiraan', '=', 'perkiraan.kd_perkiraan')
            ->get();

        return view('trsjurnal.index', compact('tampil1', 'tampil2','notrans'));
    }

    public function detail(Request $request)
    {
        // dd($request);
        $tampil = DB::table('jurnal')
            ->Join('detail_jurnal', 'detail_jurnal.no_jurnal', '=', 'jurnal.no_jurnal')
            ->get();

        return view('trsjurnal.detail', compact('tampil'));
    }
    
    public function kode($id)
    {
        // dd($id);
        $nik = DB::table('perkiraan')
        ->where('kd_perkiraan', $id)
        ->count();
        
        if ($nik > 0) {
            // $nik =  DB::select('SELECT b.no_jurnal,b.nama_trans,b.debet
            //     FROM perkiraan a
            //     INNER JOIN detail_jurnal b ON b.kd_perkiraan = a.kd_perkiraan
            //     WHERE a.kd_perkiraan = '.$id);
            $nik = DB::table('perkiraan')
            ->where('kd_perkiraan', $id)
            ->get();
            return response()->json([
                'data' =>  $nik,
                'success' => 1,
                'message' => 'Data ada ',
            ], 200);
        }
        return response()->json([
            'data' => null,
            'success' => 1,
            'message' => 'Data tidak ada',
        ], 200);
       
    }
    public function no_jurnal($id)
    {
        // dd($id);
        $nik = DB::table('jurnal')
        ->where('no_jurnal', $id)
        ->count();
        
        if ($nik > 0) {
            return response()->json([
                'data' =>  $nik,
                'success' => 1,
                'message' => 'Data sudah ada silahkan cari nomor yang lain',
            ], 200);
        }
        return response()->json([
            'data' => null,
            'success' => 1,
            'message' => 'Data tidak ada nomor bisa digunakan',
        ], 200);
       
    }

    public function store(Request $request)
    {
        if ($request->no_jurnal) {
            DB::table('detail_jurnal')
        ->where('no_jurnal', $request->no_jurnal)
        ->update(
            [
                'nama_trans' => $request->nama_trans,
                'debet' => $request->debet,
               ]
        );
        }

        $penyewa = DB::table('jurnal')
        ->where('no_jurnal', $request->no_jurnal)
        ->count();
        // dd($penyewa);
        if ($penyewa > 0) {
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
    public function notrans($id)
    {
        // dd($id);
        $category = DB::table('sewa')
        ->Join('penyewa', 'penyewa.nik', '=', 'sewa.nik')
        ->where('sewa.no_sewa', $id)
        ->select('tgl_transaksi','nama')
        ->get();

        return response()->json($category);
    }
}
