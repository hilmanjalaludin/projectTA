<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporanbayar;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class LaporanbayarController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Laporanbayar::select('*'))
                // ->addColumn('action', 'asd')
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->no_pembayaran . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="' . $data->no_pembayaran . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('lpbayar.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyId = $request->no_pembayaran;
        //  dd($companyId);
        if ($companyId == '') {
            $company = Laporanbayar::insert(
                [
                    'no_pengajuan' => $request->no_pengajuan,
                    'tgl_pembayaran' => $request->tgl_pembayaran,
                    'jumlah_pembayaran' => $request->jumlah_pembayaran,
                    'keterangan' => $request->keterangan,


                ]
            );
        } else {
            $company = DB::table('pembayaran')
                ->where('no_pembayaran', $companyId)
                ->update(
                    [
                        'no_pengajuan' => $request->no_pengajuan,
                        'jumlah_pembayaran' => $request->jumlah_pembayaran,
                        'tgl_pembayaran' => $request->tgl_pembayaran,
                        'keterangan' => $request->keterangan,

                    ]
                );
        }

        return Response()->json($company);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // dd($request->no_pembayaran);
        // die;
        $where = array('no_pembayaran' => $request->no_pembayaran);
        $company  = Laporanbayar::where($where)->first();
        // dd($company);

        return Response()->json($company);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = Laporanbayar::where('no_pembayaran', $request->id)->delete();

        return Response()->json($company);
    }
}
