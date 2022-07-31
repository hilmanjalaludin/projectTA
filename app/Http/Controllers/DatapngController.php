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
use Illuminate\Support\Facades\Auth;

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
        // dd($request);
            $company = DataPng::insert(
                [
                        'id_user' => $request['id_user'],
                        'name' => $request['name'],
                        'password' => bcrypt($request['password']),
                        'hak_akses' => 'supir',
                        'no_ktp' => $request['no_ktp'],
                        'jenkel' => $request['jenkel'],
                        'telpon' => $request['telpon'],
                        'almt' => $request['almt'],
                      
                ]
            );
            return view('dtpng.index');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd(Auth::DataPng()->password);
        // dd($request);
        $tampil = DB::table('user')
        ->where('id_user', $request['id_user'])
        ->first();
        // dd($tampil->password);
        if (!(Hash::check($request['password'], $tampil->password))) {
             return redirect()->back()->with('error','Password lama anda salah');
        }
        if ($request['new_password'] != $request['confirm_password']) {
             return redirect()->back()->with('error','Password konfirmasi tidak sama');
        }
        

             DB::table('user')
                ->where('id_user', $request['id_user'])
                ->update(
                    [
                        'id_user' => $request['id_user'],
                        // 'name' => $request['name'],
                        // 'password' => Hash::make($request['new_password']),
                        'password' => bcrypt($request->new_password)

                        // 'hak_akses' => $request['hak_akses'],
                        // 'no_ktp' => $request['no_ktp'],
                        // 'jenkel' => $request['jenkel'],
                        // 'telpon' => $request['telpon'],
                        // 'almt' => $request['almt'],
                    ]
                );
                 return redirect()->back()->withSuccess('Password berhasil di update');
    }
    
    public function updateusr(Request $request)
    {
        // dd($request);
                     DB::table('user')
                ->where('id_user', $request['id_user_a'])
                ->update(
                    [
                        'id_user' => $request['id_user'],
                        'name' => $request['name'],
                        'password' => bcrypt($request->password),
                        // 'password' => bcrypt($request->new_password),

                        'hak_akses' => $request['hak_akses'],
                        'no_ktp' => $request['no_ktp'],
                        'jenkel' => $request['jenkel'],
                        'telpon' => $request['telpon'],
                        'almt' => $request['almt'],
                    ]
                );
                 return redirect()->back()->withSuccess('Password berhasil di update');
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
