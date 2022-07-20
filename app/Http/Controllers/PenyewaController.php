<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewa;
use Datatables;
use Illuminate\Support\Facades\DB;
use Session;

class PenyewaController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Penyewa::select('*');
            if (Session::get('hak_akses') == 'direktur') {
            return datatables()->of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->nik . ' )" data-original-title="Edit" class="edit btn btn-primary edit" >Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->nik . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger" >Delete</a>';
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
        return view('penyewa.indexd');
        }
        return view('penyewa.index');
    }


   
    public function store(Request $request)
    {
            $company = Penyewa::insert(
                [
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'alamat' => $request->alamat,
                    'jml_sewa' => $request->jml_sewa,
                    'keterangan' => $request->keterangan,
                ]
            );
        
        return Response()->json($company);
    }
    
    public function update(Request $request)
    {
        $companyId = $request->nik;
            $company = DB::table('penyewa')
                ->where('nik', $companyId)
                ->update(
                    [
                        'nama' => $request->nama,
                        'telp' => $request->telp,
                        'alamat' => $request->alamat,
                        'jml_sewa' => $request->jml_sewa,
                        'keterangan' => $request->keterangan,
                        
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
        // dd($request->nik);
        // die;
        $where = array('nik' => $request->nik);
        $company  = Penyewa::where($where)->first();
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
        $company = Penyewa::where('nik', $request->id)->delete();

        return Response()->json($company);
    }
}
