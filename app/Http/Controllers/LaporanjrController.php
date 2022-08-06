<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
use PDF;
class LaporanjrController extends Controller
{
    public function index()
    {
        $tampil = DB::table('user')
                ->Join('jurnal', 'user.id_user', '=', 'jurnal.id_user')
                ->get('user.*');
                // dd($tampil);
        return view('lpjurnal.index', compact('tampil'));
    }

    public function detail(Request $request)
    {
        // dd($request);
        $tampil = DB::table('jurnal')
        // ->Join('jurnal', 'user.id_user', '=', 'jurnal.id_user')
        ->Join('detail_jurnal', 'jurnal.no_jurnal', '=', 'detail_jurnal.no_jurnal')
        // ->Join('perkiraan', 'perkiraan.kd_perkiraan', '=', 'detail_jurnal.kd_perkiraan')
        ->where('jurnal.no_jurnal', $request->no_jurnal)
        ->get();

        if ($request->tombol == 'export') {
            $data = [
                'title' => 'Laporan Jurnal',
                'tampil'          => $tampil,
            ];
            
            // dd($data,$tampil);

            $pdf = PDF::loadView('lpjurnal.export', $data);
    
            return $pdf->download('laporan_jurnal.pdf');
        }

        return view('lpjurnal.detail',compact('tampil'));
    }



}
