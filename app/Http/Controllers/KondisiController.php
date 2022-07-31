<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kondisi;
use Datatables;
use App\Helpers\FlashMessages;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\DB;
use Session;

class KondisiController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {

            $data = Kondisi::select('*');
            if (Session::get('hak_akses') == 'direktur') {
                return datatables()->of($data)
                    ->addColumn('action', function ($data) {
                        $button = '<a href="javascript:void(0)" data-toggle="tooltip"  id="' . $data->kd_kondisi . '" onclick="editFunc(event)" data-original-title="Edit" class="edit btn btn-primary edit" >Edit</a>';
                        $button .= '&nbsp; <a href="javascript:void(0);"  id="' . $data->kd_kondisi . '" onclick="deleteFunc(event)" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger" >Delete</a>';
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
            $mobil = DB::table('mobil')
                ->get();
            return view('kondisi.indexd', compact('mobil'));
        }
        $mobil = DB::table('mobil')
            ->get();
        return view('kondisi.index', compact('mobil'));
    }



    public function store(Request $request)
    {
               $company = Kondisi::insert(
            [
                // 'kd_kondisi' => $request->kd_kondisi,
                'kd_mobil' => $request->kd_mobil,
                'bensin' => $request->bensin,
                'kilometer' => $request->kilometer,
                'depan' => $request->depan,
                'belakang' => $request->belakang,
                'kanan' => $request->kanan,
                'kiri' => $request->kiri,
            ]
        );

        // return redirect()->back()->withSuccess('Kondisi berhasil di insert');
        return \App::make('redirect')->back()->refresh()->withSuccess('Kondisi berhasil di insert');

    }
    public function update(Request $request)
    {
        $companyId = $request->kd_kondisi;
        $company = DB::table('kondisi')
            ->where('kd_kondisi', $request->kd_kondisi_a)
            ->update(
                [
                    'kd_kondisi' => $request->kd_kondisi,
                    'kd_mobil' => $request->kd_mobil,
                    'bensin' => $request->bensin,
                    'kilometer' => $request->kilometer,
                    'depan' => $request->depan,
                    'belakang' => $request->belakang,
                    'kanan' => $request->kanan,
                    'kiri' => $request->kiri,

                ]
            );

            return redirect()->back()->withSuccess('Kondisi berhasil di update');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // dd($request->kd_kondisi);
        // die;
        $where = array('kd_kondisi' => $request->kd_kondisi);
        $company  = Kondisi::where($where)->first();
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
        $company = Kondisi::where('kd_kondisi', $request->id)->delete();

        return Response()->json($company);
    }
}
