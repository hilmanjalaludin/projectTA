<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanjr;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class LaporanjrController extends Controller
{
    public function index(Request $request)
    {
        //asdasd dd($request['tgl_jurnal1']);
        if ($request['tgl_jurnal1'] != '' && $request['tgl_jurnal2'] != '') {
            $tampil = DB::table('jurnal')
                ->where('tgl_jurnal', '=', $request['tgl_jurnal1'])
                ->where('tgl_jurnal', '=', $request['tgl_jurnal2'])
                ->get();
        } else {

            $tampil = "";
        }
        return view('lpjurnal.index', compact('tampil'));
    }
}
