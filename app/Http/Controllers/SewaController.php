<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Sewa::select('*');
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->no_sewa . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    // $button .= '<a href="'.route('biodata.tampildata').'" class="btn btn-success">detail</a>';
                    $button .= '<a href="' . route('biodata.tampildata', $data->no_sewa) .'" class="btn btn-success">Detail</a>'; 
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->no_sewa . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('sewa.index');
    }


    public function store(Request $request)
    {
            $company = Sewa::insert(
                [
                    'no_sewa' => $request->no_sewa,
                    'tgl_transaksi' => $request->tgl_transaksi,
                    'jml_mobil' => $request->jml_mobil,
                    'dp' => $request->dp,
                    'kurang' => $request->kurang,
                    'status_sewa' => $request->status_sewa,
                    'nik' => $request->nik,
                    'id_user' => $request->id_user,
                ]
            );
        return Response()->json($company);
    }

    public function update(Request $request)
    {
        $companyId = $request->no_sewa;
            $company = DB::table('Sewa')
                ->where('no_sewa', $companyId)
                ->update(
                    [
                        'tgl_transaksi' => $request->tgl_transaksi,
                        'jml_mobil' => $request->jml_mobil,
                        'dp' => $request->dp,
                        'kurang' => $request->kurang,
                        'status_sewa' => $request->status_sewa,
                        'nik' => $request->nik,
                        'id_user' => $request->id_user,
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
        // dd($request->no_sewa);
        // die;
        $where = array('no_sewa' => $request->no_sewa);
        $company  = Sewa::where($where)->first();
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
        $company = Sewa::where('no_sewa', $request->id)->delete();

        return Response()->json($company);
    }

    public function detailsewa($id)
    {
        //  dd($id);
        // die;
        // $where = array('no_sewa' => $id);
        // $company  = Sewa::where($where)->first();
        $company = DB::table('detail_sewa')
        ->select('*')
        ->where('detail_sewa.no_sewa', '=', $id)
        ->get();

        //  dd($company);

        return view('sewa.detail',compact('company'));
    }

}
