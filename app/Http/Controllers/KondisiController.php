<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kondisi;
use Datatables;
use App\Helpers\FlashMessages;
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
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->kd_kondisi . ' )" data-original-title="Edit" class="edit btn btn-primary edit" >Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->kd_kondisi . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger" >Delete</a>';
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
        return view('kondisi.indexd', compact('mobil'));
        }
        $mobil = DB::table('mobil')
            ->get();
        return view('kondisi.index', compact('mobil'));
    }


    
    public function store(Request $request)
    {
        DB::table('mobil')
        ->where('kd_mobil', $request->kd_mobil)
        ->update(
            [
                'kd_mobil' => $request->kd_mobil,
                'jenis' => $request->jenis,
                'no_polisi' => $request->no_polisi,
                'biaya' => $request->biaya,
            ]
        );
            $company = Kondisi::insert(
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
       
        return Response()->json($company);
    }
    public function update(Request $request)
    {
        $companyId = $request->kd_kondisi;
            $company = DB::table('kondisi')
                ->where('kd_kondisi', $companyId)
                ->update(
                    [
                        'kd_mobil' => $request->kd_mobil,
                        'bensin' => $request->bensin,
                        'kilometer' => $request->kilometer,
                        'depan' => $request->depan,
                        'belakang' => $request->belakang,
                        'kanan' => $request->kanan,
                        'kiri' => $request->kiri,
                        
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
