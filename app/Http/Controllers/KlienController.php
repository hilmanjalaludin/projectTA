<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klien;
use Datatables;
use App\Helpers\FlashMessages;
use Illuminate\Support\Facades\DB;

class KlienController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $data = Klien::select('*');
            return datatables()->of($data)
                // ->addColumn('action', 'company-action')

                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="editFunc(' . $data->id_klien . ' )" data-original-title="Edit" class="edit btn btn-primary edit">Edit</a>';
                    $button .= '&nbsp; <a href="javascript:void(0);" id="delete-compnay" onclick="deleteFunc(' . $data->id_klien . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('klien.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyId = $request->id_klien;
        //  dd($companyId);
        if ($companyId == '') {
            $company = Klien::insert(
                [
                    'nama_klien' => $request->nama_klien,
                    'nik_klien' => $request->nik_klien,
                    'tempat_lahir_klien' => $request->tempat_lahir_klien,
                    'tgl_lahir_klien' => $request->tgl_lahir_klien,
                    'jenis_kelamin_klien' => $request->jenis_kelamin_klien,
                    'pekerjaan_klien' => $request->pekerjaan_klien,
                    'nlamat_klien' => $request->nlamat_klien,
                    'no_tlp_klien' => $request->no_tlp_klien,
                ]
            );
        } else {
            $company = DB::table('klien')
                ->where('id_klien', $companyId)
                ->update(
                    [
                        'nama_klien' => $request->nama_klien,
                        'nik_klien' => $request->nik_klien,
                        'tempat_lahir_klien' => $request->tempat_lahir_klien,
                        'tgl_lahir_klien' => $request->tgl_lahir_klien,
                        'jenis_kelamin_klien' => $request->jenis_kelamin_klien,
                        'pekerjaan_klien' => $request->pekerjaan_klien,
                        'nlamat_klien' => $request->nlamat_klien,
                        'no_tlp_klien' => $request->no_tlp_klien,
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
        // dd($request->id_klien);
        // die;
        $where = array('id_klien' => $request->id_klien);
        $company  = Klien::where($where)->first();
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
        $company = Klien::where('id_klien', $request->id)->delete();

        return Response()->json($company);
    }
}
