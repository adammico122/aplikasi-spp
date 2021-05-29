<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\IuranModel;

class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $iuran = IuranModel::all();
        if($request->ajax()){
            return datatables()->of($iuran)
                        ->addColumn('action', function($data){ // Action Adalah Nama Dari Array Penampung Button
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_iuran.'" data-original-title="Edit" class="edit btn btn-icon btn-primary edit-post"><i class="ik ik-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_iuran.'" class="delete btn btn-icon btn-danger"><i class="ik ik-x"></i></button>';     
                            return $button;
                        })
                ->rawColumns(['action']) // rawColumns Gunanya Untuk Merubah $button Menjadi Array Agar Tidak Dianggap String Biasa
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.iuran.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id_iuran;
        $post   =   IuranModel::updateOrCreate(['iuran.id_iuran' => $id],
                    [
                        'bulan_bayar'       => $request->get('bulan_bayar'),
                        'tahun_bayar'       => $request->get('tahun_bayar'),
                        'total_bayar'       => $request->get('total_bayar'),
                        'keterangan_bayar'  => $request->get('keterangan_bayar')
                    ]); 

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_iuran)
    {
        $where = array('id_iuran' => $id_iuran);
        $post  = IuranModel::where($where)->first();
     
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_iuran)
    {
        $post = IuranModel::where('id_iuran', '=', $id_iuran)->delete();
     
        return response()->json($post);
    }
}
