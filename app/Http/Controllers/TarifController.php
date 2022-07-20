<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarif;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
use Session;
class TarifController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Tarif::select('*');
            if (Session::get('hak_akses') == 'direktur') {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->kd_tarif . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->kd_tarif . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
            }else {
                return datatables()->of($data)
                ->make(true);
            }
        }
        if (Session::get('hak_akses') == 'direktur') {
        return view('tarif.indexd');
    }
    return view('tarif.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
            $company = Tarif::insert(
                [
                    'kd_tarif' => $request->kd_tarif,
                    'daerah' => $request->daerah,
                    'tarif' => $request->tarif,
                ]
            );
       

        return Response()->json($company);
    }

    public function update(Request $request)
    {
        $companyId = $request->kd_tarif;
        //  dd($request);
            $company = DB::table('Tarif')
                ->where('kd_tarif', $companyId)
                ->update(
                    [
                        'daerah' => $request->daerah,
                        'tarif' => $request->tarif,
                        
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
        // dd($request->kd_tarif);
        // die;
        $where = array('kd_tarif' => $request->kd_tarif);
        $company  = Tarif::where($where)->first();
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
        $company = Tarif::where('kd_tarif', $request->id)->delete();

        return Response()->json($company);
    }
}
