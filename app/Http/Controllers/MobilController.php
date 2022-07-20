<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
use Session;
class MobilController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Mobil::select('*');
            if (Session::get('hak_akses') == 'direktur') {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->kd_mobil . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->kd_mobil . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
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
        return view('mobil.indexd');
        }
        return view('mobil.index');
    }


    public function store(Request $request)
    {
            $company = Mobil::insert(
                [
                    'kd_mobil' => $request->kd_mobil,
                    'jenis' => $request->jenis,
                    'type' => $request->type,
                    'warna' => $request->warna,
                    'tahun' => $request->tahun,
                    'no_polisi' => $request->no_polisi,
                    'no_rangka' => $request->no_rangka,
                    'no_mesin' => $request->no_mesin,
                    'biaya' => $request->biaya,
                    'status' => $request->status,
                ]
            );
       
        return Response()->json($company);
    }
    public function update(Request $request)
    {
        $companyId = $request->kd_mobil;
        //  dd($companyId);
            $company = DB::table('mobil')
                ->where('kd_mobil', $companyId)
                ->update(
                    [
                        'jenis' => $request->jenis,
                        'type' => $request->type,
                        'warna' => $request->warna,
                        'tahun' => $request->tahun,
                        'no_polisi' => $request->no_polisi,
                        'no_rangka' => $request->no_rangka,
                        'no_mesin' => $request->no_mesin,
                        'biaya' => $request->biaya,
                        'status' => $request->status,
                        
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
        // dd($request->kd_mobil);
        // die;
        $where = array('kd_mobil' => $request->kd_mobil);
        $company  = Mobil::where($where)->first();
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
        $company = Mobil::where('kd_mobil', $request->id)->delete();

        return Response()->json($company);
    }
}
