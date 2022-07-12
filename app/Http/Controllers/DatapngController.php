<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPng;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;


class DatapngController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = DataPng::select('*');
            return datatables()->of($data)
                // ->addColumn('action', 'company-action')

                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->id_pengguna . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->id_pengguna . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('dtpng.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyId = $request->id_pengguna;
        //  dd($companyId);
        if ($companyId == '') {
            $company = DataPng::insert(
                [
                    'nama_pengguna' => $request->nama_pengguna,
                    'password' => $request->password,
                    'hak_akses' => $request->hak_akses,


                ]
            );
        } else {
            $company = DB::table('pengguna')
                ->where('id_pengguna', $companyId)
                ->update(
                    [
                        'nama_pengguna' => $request->nama_pengguna,
                        'password' => $request->password,
                        'hak_akses' => $request->hak_akses,


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
        // dd($request->id_pengguna);
        // die;
        $where = array('id_pengguna' => $request->id_pengguna);
        $company  = DataPng::where($where)->first();
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
        $company = DataPng::where('id_pengguna', $request->id)->delete();

        return Response()->json($company);
    }
}
