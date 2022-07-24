<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

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
        $tampil = DB::table('user')
        ->Join('kembali', 'user.id_user', '=', 'kembali.id_user')
        ->Join('detail_kembali', 'kembali.no_kembali', '=', 'detail_kembali.no_kembali')
        ->Join('sewa', 'sewa.id_user', '=', 'user.id_user')
        ->Join('detail_sewa', 'sewa.no_sewa', '=', 'detail_sewa.no_sewa')
        ->where('kembali.tgl_trans', '>=', $request->tglaw)
        ->where('kembali.tgl_trans', '<=', $request->tglak)
        ->get();
        return view('lppengem.detail',compact('tampil'));
    }



}
