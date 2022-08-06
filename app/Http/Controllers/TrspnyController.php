<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class TrspnyController extends Controller
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
        // ->leftJoin('detail_sewa', 'mobil.kd_mobil', '=', 'detail_sewa.kd_mobil')
        ->Join('kondisi', 'mobil.kd_mobil', '=', 'kondisi.kd_mobil')
        ->get();
        // <td>Kode Mobil</td>
        // <td>Biaya</td>
        // <td>Tgl Sewa</td>
        // <td>Jam Sewa</td>
        // <td>Lama Sewa</td>
        // <td>TglKembali</td>
        // <td>Jam Kembali</td>
        // <td>Subtotal</td>

        
        return view('trspny.index', compact('tampil','dtl_sewa','kembali','pilih_mobil'));
    }

    public function detail($id)
    {
        // dd($id);
        $category = DB::table('mobil')
        // ->leftJoin('detail_sewa', 'mobil.kd_mobil', '=', 'detail_sewa.kd_mobil')
        ->Join('kondisi', 'mobil.kd_mobil', '=', 'kondisi.kd_mobil')
        ->where('kondisi.kd_mobil', $id)
        ->get();

        return response()->json($category);
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
                'message' => 'Data sudah ada silahkan cari nomor lain',
            ], 200);
        }
        return response()->json([
            'data' => null,
            'success' => 1,
            'message' => 'Data tidak ada Nomor bisa digunakan',
        ], 200);
       
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $sewa = DB::table('sewa')
        ->where('no_sewa', $request->no_sewa)
        ->count();
        // dd($sewa);
        if ($sewa >0) {
            // return redirect()->back()->withSuccess('Data berhasil');
            return redirect()->back()->with('error','No Sewa sudah ada');
        }

        $penyewa = DB::table('penyewa')
        ->where('nik', $request->nik)
        ->count();
        // dd($penyewa);
        if ($penyewa < 0) {
            DB::table('penyewa')->insert(
                [
                    'nama' => $request->nama,
                    'nik' => $request->nik,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                ]
            );
        }else{
            DB::table('penyewa')
            ->where('nik', $request->nik)
            ->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'telp' => $request->telp,

                ]
            );
        }

        
        
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
       

        DB::table('kembali')->insert(
            [
                'total_bayar' => $request->total_bayar,
                'no_sewa' => $request->no_sewa,
            ]
        );
        $id = DB::getPdo()->lastInsertId();
        DB::table('detail_kembali')->insert(
            [
                'no_kembali' => $id,
                // 'total_bayar' => $request->total_bayar,
                // 'no_sewa' => $request->no_sewa,
            ]
        );
        
        return redirect()->back()->withSuccess('Data berhasil');
    }
    
    public function update(Request $request)
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
