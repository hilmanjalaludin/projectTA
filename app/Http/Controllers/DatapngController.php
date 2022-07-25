<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataPng;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator, Redirect, Response;
use Session;

class DatapngController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = DataPng::where('hak_akses', '!=', 'direktur')
                ->select('*');
            if (Session::get('hak_akses') == 'direktur') {
                return datatables()->of($data)
                    // ->addColumn('action', 'company-action')

                    ->addColumn('action', function ($data) {
                        $button = '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $data->id_user . '" onclick="editFunc(event)" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                        $button .= '&nbsp; <a href="javascript:void(0);" id="' . $data->id_user . '" onclick="deleteFunc(event)" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
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
            return view('dtpng.indexd');
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
        // if ($request->id_user == '') {
        $tampil = DB::table('user')
            ->where('user.id_user', $request->id_user)
            ->count();

        // }
        // dd($request->id_user);
        // dd($companyId != $tampil->id_user);
        if ($tampil == 0) {
            // echo 'insert';
            $company = DataPng::insert(
                [
                    'id_user' => $request->id_user,
                    'name' => $request->name,
                    'password' => $request->password,
                    'hak_akses' => 'supir',
                    'no_ktp' => $request->no_ktp,
                    'jenkel' => $request->jenkel,
                    'telpon' => $request->telpon,
                    'almt' => $request->almt,
                ]
            );
        } else {

            $company = DB::table('user')
                ->where('id_user', $request->id_user)
                ->update(
                    [
                        'id_user' => $request->id_user,
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
        die;

        return Response()->json($company);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $companyId = $request->id_user;
        // dd($companyId);
        $pass = Hash::make($request->password);
        $company = DB::table('user')
            ->where('id_user', $companyId)
            ->first();
        // dd($company->password);
        if (!Hash::check($request->password, $company->password)) {
            return redirect()->back()->with('error', 'Password lama salah');
        }
        // dd($request);

        if ($request->new_password != $request->confirm_password) {
            return redirect()->back()->with('error', 'Ulangi Password tidak sama');
        }

        $new_pass = Hash::make($request->new_password);
        $companyId = $request->id_user;
        $company = DB::table('user')
            ->where('id_user', $companyId)
            ->update(
                [
                    'password' => $new_pass,
                    // 'name' => $request->name,
                    // 'hak_akses' => $request->hak_akses,
                    // 'no_ktp' => $request->no_ktp,
                    // 'jenkel' => $request->jenkel,
                    // 'telpon' => $request->telpon,
                    // 'almt' => $request->almt,
                ]
            );
        return redirect()->back()->withSuccess('Password berhasil dirubah');
    }

    public function edit(Request $request)
    {
        // dd($request->id_user);
        // die;
        $where = array('id_user' => $request->id_user);
        $company  = DataPng::where($where)->first();
        // dd($company);

        return Response()->json($company);
    }

    public function detail($id)
    {
        // dd($id);
        // die;
        $where = array('id_user' => $id);
        $company  = DataPng::where($where)->first();
        // dd($company);

        // return Response()->json($company);
        return view('dtpng.detail', compact('company'));
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
