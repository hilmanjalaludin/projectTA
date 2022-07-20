<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kembali;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class KembaliController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Kembali::select('*');
            return datatables()->of($data)
                // ->addColumn('action', 'company-action')

                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->no_kembali . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    // $button .= '<a href="' . route('biodata.tampildata', $data->no_sewa) .'" class="btn btn-success">Detail</a>'; 
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->no_kembali . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kembali.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyId = $request->no_kembali;
        //  dd($companyId);
        // ['no_kembali', 'tgl_trans','jmlh_mobil','total_bayar','status_kembali','no_sewa','id_user']
        if ($companyId == '') {
            $company = Kembali::insert(
                [
                    'tgl_trans' => $request->tgl_trans,
                    'jmlh_mobil' => $request->jmlh_mobil,
                    'total_bayar' => $request->total_bayar,
                    'status_kembali' => $request->status_kembali,
                    'no_sewa' => $request->no_sewa,
                    'id_user' => $request->id_user,
                ]
            );
        } else {
            $company = DB::table('kembali')
                ->where('no_kembali', $companyId)
                ->update(
                    [
                        'jmlh_mobil' => $request->jmlh_mobil,
                        'total_bayar' => $request->total_bayar,
                        'status_kembali' => $request->status_kembali,
                        'no_sewa' => $request->no_sewa,
                        'id_user' => $request->id_user,
                        
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
        // dd($request->no_kembali);
        // die;
        $where = array('no_kembali' => $request->no_kembali);
        $company  = Kembali::where($where)->first();
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
        $company = Kembali::where('no_kembali', $request->id)->delete();

        return Response()->json($company);
    }

    public function detailkembali($id)
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
