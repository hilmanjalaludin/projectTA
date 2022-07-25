<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class LaporanmstController extends Controller
{
    public function index()
    {
        $tampil = DB::table('user')
                ->Join('jurnal', 'user.id_user', '=', 'jurnal.id_user')
                ->get('user.*');
                // dd($tampil);
        return view('lpmst.index', compact('tampil'));
    }

    public function detail(Request $request)
    {
        // dd($request);
        $tampil = DB::table('user')
        ->Join('jurnal', 'user.id_user', '=', 'jurnal.id_user')
        ->where('jurnal.id_user', $request->id_user)
        ->get();

        return view('lpmst.detail',compact('tampil'));
    }



}