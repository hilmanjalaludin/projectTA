<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPrk;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
use Session;

class DataprkController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = DataPrk::select('*');
            if (Session::get('hak_akses') == 'direktur') {
                return datatables()->of($data)
                    // ->addColumn('action', 'company-action')

                    ->addColumn('action', function ($data) {
                        $button = '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $data->kd_perkiraan . '" onclick="editFunc(event)" data-original-title="Edit" class="edit btn btn-primary edit" >Edit</a>';
                        $button .= '&nbsp; <a href="javascript:void(0);" id="' . $data->kd_perkiraan . '" onclick="deleteFunc(event)" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger" >Delete</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
            } else {
                return datatables()->of($data)
                    ->make(true);
            }
        }
        if (Session::get('hak_akses') == 'direktur') {
            return view('dtprk.indexd');
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
        $company = DataPrk::insert(
            [
                'kd_perkiraan' => $request->kd_perkiraan,
                'jns_perkiraan' => $request->jns_perkiraan,
                'nm_perkiraan' => $request->nm_perkiraan,

            ]
        );

        return Response()->json($company);
    }
    public function update(Request $request)
    {
        $companyId = $request->kd_perkiraan;
        $company = DB::table('perkiraan')
            ->where('kd_perkiraan', $request->kd_perkiraan_a)
            ->update(
                [
                    'kd_perkiraan' => $request->kd_perkiraan,
                    'jns_perkiraan' => $request->jns_perkiraan,
                    'nm_perkiraan' => $request->nm_perkiraan,

                ]
            );

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
        // dd($request->kd_perkiraan);
        // die;
        $where = array('kd_perkiraan' => $request->kd_perkiraan);
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
        $company = DataPrk::where('kd_perkiraan', $request->id)->delete();

        return Response()->json($company);
    }
}
