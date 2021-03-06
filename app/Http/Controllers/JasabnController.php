<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jasabn;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class JasabnController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Jasabn::select('*');
            return datatables()->of($data)
                // ->addColumn('action', 'company-action')

                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->no_pembayaran . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->no_pembayaran . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('jasabn.index');
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
            $company = Jasabn::insert(
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
                        'tgl_pembayaran' => $request->tgl_pembayaran,
                        'jumlah_pembayaran' => $request->jumlah_pembayaran,
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
        $company  = Jasabn::where($where)->first();
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
        $company = Jasabn::where('no_pembayaran', $request->id)->delete();

        return Response()->json($company);
    }
}
