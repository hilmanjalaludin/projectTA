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
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->id_user . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->id_user . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
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
        $companyId = $request->id_user;
        //  dd($companyId);
        if ($companyId == '') {
            $company = DataPng::insert(
                [
                    'name' => $request->name,
                    'password' => $request->password,
                    'hak_akses' => $request->hak_akses,
                    'no_ktp' => $request->no_ktp,
                    'jenkel' => $request->jenkel,
                    'telpon' => $request->telpon,
                    'almt' => $request->almt,
                ]
            );
        } else {
            $company = DB::table('user')
                ->where('id_user', $companyId)
                ->update(
                    [
                        'name' => $request->name,
                        'password' => $request->password,
                        'hak_akses' => $request->hak_akses,
                        'no_ktp' => $request->no_ktp,
                        'jenkel' => $request->jenkel,
                        'telpon' => $request->telpon,
                        'almt' => $request->almt,
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
        // dd($request->id_user);
        // die;
        $where = array('id_user' => $request->id_user);
        $company  = DataPng::where($where)->first();
        // dd($company);

        return Response()->json($company);
    }
    
    public function detail( $id)
    {
        // dd($id);
        // die;
        $where = array('id_user' => $id);
        $company  = DataPng::where($where)->first();
        // dd($company);

        // return Response()->json($company);
        return view('dtpng.detail',compact('company'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $company = DataPng::where('id_user', $request->id)->delete();

        return Response()->json($company);
    }
}
