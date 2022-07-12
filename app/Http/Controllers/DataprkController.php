<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPrk;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class DataprkController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = DataPrk::select('*');
            return datatables()->of($data)
                // ->addColumn('action', 'company-action')

                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->kode_akun . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->kode_akun . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dtprk.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyId = $request->kode_akun;
        //  dd($companyId);
        if ($companyId == '') {
            $company = DataPrk::insert(
                [
                    'nama_akun' => $request->nama_akun,
                    'jenis_akun' => $request->jenis_akun,
                    'saldo_normal' => $request->saldo_normal,


                ]
            );
        } else {
            $company = DB::table('perkiraan')
                ->where('kode_akun', $companyId)
                ->update(
                    [
                        'nama_akun' => $request->nama_akun,
                        'saldo_normal' => $request->saldo_normal,
                        'jenis_akun' => $request->jenis_akun,

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
        // dd($request->kode_akun);
        // die;
        $where = array('kode_akun' => $request->kode_akun);
        $company  = DataPrk::where($where)->first();
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
        $company = DataPrk::where('kode_akun', $request->id)->delete();

        return Response()->json($company);
    }
}
