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
        $pilih_mobil = DB::table('mobil')
            // ->Join('mobil', 'mobil.kd_mobil', '=', 'detail_sewa.kd_mobil')
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
        $sewa = DB::table('sewa')
        ->where('no_sewa', $request->no_sewa)
        ->count();
        // dd($sewa);
        if ($sewa == 0) {
            DB::table('sewa')->insert(
                [
                    'no_sewa' => $request->no_sewa,
                    'tgl_transaksi' => $request->tgl_transaksi,
                    'nik' => $request->nik,
                    'dp' => $request->dp,
                    'kurang' => $request->kurang,
                ]
            );

            DB::table('detail_sewa')->insert(
                [
                    'no_sewa' => $request->no_sewa,
                    'kd_mobil' => $request->kd_mobil,
                    'jam_sewa' => $request->jam_sewa,
                    'lama_sewa' => $request->lama_sewa,
                    'tgl_kembali' => $request->tgl_kembali,
                    'jam_kembali' => $request->jam_kembali,
                    'supir' => $request->supir,
                    'subtotal' => $request->subtotal,
                ]
            );
        }


         
        $penyewa = DB::table('penyewa')
        ->where('nik', $request->nik)
        ->count();
        // dd($penyewa);
        if ($penyewa == 0) {
            // return redirect()->back()->withSuccess('Data berhasil');
            // return redirect()->back()->with('error','No Penyewa sudah ada');
            DB::table('penyewa')->insert(
                [
                    'nik' => $request->nik,
                    'keterangan' => $request->keterangan,
    
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                ]
            );
        }


        DB::table('penyewa')
        ->where('nik', $request->nik)
        ->update(
            [
                'keterangan' => $request->keterangan,
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
            ]
        );
    
        DB::table('sewa')
        ->where('no_sewa', $request->no_sewa)
        ->update(
            [
                'tgl_transaksi' => $request->tgl_transaksi,
                'nik' => $request->nik,
                'dp' => $request->dp,
                'kurang' => $request->kurang,
                'id_user' => $request->id_user,
            ]
        );
    
        DB::table('detail_sewa')
        ->where('no_sewa', $request->no_sewa)
        ->update(
            [
                'no_sewa' => $request->no_sewa,
                'kd_mobil' => $request->kd_mobil,
                'jam_sewa' => $request->jam_sewa,
                'lama_sewa' => $request->lama_sewa,
                'tgl_kembali' => $request->tgl_kembali,
                'jam_kembali' => $request->jam_kembali,
                'supir' => $request->supir,
                'subtotal' => $request->subtotal,
            ]
        );

        
        DB::table('kembali')->insert(
            [
                // 'no_kembali' => $request->no_kembali,
                'total_bayar' => $request->total_bayar,
                'id_user' => $request->id_user,

            ]
        );
        $id = DB::getPdo()->lastInsertId();
        DB::table('detail_kembali')->insert(
            [
                'no_kembali' => $id,
                'denda_telat' => $request->denda_telat,
                'kondisi' => $request->kondisi,
                'denda_kondisi' => $request->denda_kondisi,
                'terlambat' => $request->terlambat,

            ]
        );

        return redirect()->back()->withSuccess('Data berhasil');
    }

    public function nik($id)
    {
        // dd($id);
        $nik = DB::table('penyewa')
        ->where('nik', $id)
        ->count();
        
        if ($nik > 0) {
            $dtnik = DB::table('penyewa')
            ->where('nik', $id)
            ->get();
            
            return response()->json([
                'data' =>  $dtnik,
                'success' => 1,
                'message' => 'Data Sudah ada',
            ], 200);
        }
        return response()->json([
            'data' => null,
            'success' => 0,
            'message' => 'Data Tidak ada',
        ], 400);
       
    }
    public function no_sewa($id)
    {
        // dd($id);
        $nik = DB::table('sewa')
        ->where('no_sewa', $id)
        ->count();
        
        if ($nik > 0) {
            return response()->json([
                'data' =>  null,
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
    
}
