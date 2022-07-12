<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balik_nama;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class BaliknamaController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $data = Balik_nama::select('*');
            return datatables()->of($data)
                // ->addColumn('action', 'company-action')

                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->no_pengajuan . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->no_pengajuan . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('blknama.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyId = $request->no_pengajuan;
        //  dd($companyId);
        if ($companyId == '') {
            $company = Balik_nama::insert(
                [
                    'tgl_pengajuan' => $request->tgl_pengajuan,
                    'jenis_pengajuan' => $request->jenis_pengajuan,
                    'syarat_ktp' => $request->syarat_ktp,
                    'syarat_kk' => $request->syarat_kk,
                    'syarat_sppt' => $request->syarat_sppt,
                    'syarat_surat_tanah' => $request->syarat_surat_tanah,
                    'biaya_pembuatan' => $request->biaya_pembuatan,
                    'jenis_pembayaran' => $request->jenis_pembayaran,
                ]
            );
        } else {
            $company = DB::table('Balik_nama')
                ->where('no_pengajuan', $companyId)
                ->update(
                    [
                        'tgl_pengajuan' => $request->tgl_pengajuan,
                        'jenis_pengajuan' => $request->jenis_pengajuan,
                        'syarat_ktp' => $request->syarat_ktp,
                        'syarat_kk' => $request->syarat_kk,
                        'syarat_sppt' => $request->syarat_sppt,
                        'syarat_surat_tanah' => $request->syarat_surat_tanah,
                        'biaya_pembuatan' => $request->biaya_pembuatan,
                        'jenis_pembayaran' => $request->jenis_pembayaran,
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
        // dd($request->no_pengajuan);
        // die;
        $where = array('no_pengajuan' => $request->no_pengajuan);
        $company  = Balik_nama::where($where)->first();
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
        $company = Balik_nama::where('no_pengajuan', $request->id)->delete();

        return Response()->json($company);
    }
}
