<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\KelasModel;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas = KelasModel::all();
        if($request->ajax()){
            return datatables()->of($kelas)
                        ->addColumn('action', function($data){ // Action Adalah Nama Dari Array Penampung Button
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kelas.'" data-original-title="Edit" class="edit btn btn-icon btn-primary edit-post"><i class="ik ik-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_kelas.'" class="delete btn btn-icon btn-danger"><i class="ik ik-x"></i></button>';     
                            return $button;
                        })
                ->rawColumns(['action']) // rawColumns Gunanya Untuk Merubah $button Menjadi Array Agar Tidak Dianggap String Biasa
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.kelas.list');
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
        $id = $request->id_kelas;
        /* $request->validate([
            'id_kelas'          => 'required|exists:kelas,id_kelas,'.$id,
            'nama_kelas'        => 'required|string'
        ]); */ 
        $post   =   KelasModel::updateOrCreate(['kelas.id_kelas' => $id],
                    [
                        'nama_kelas' => $request->get('nama_kelas')
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
    public function edit($id_kelas)
    {
        $where = array('id_kelas' => $id_kelas);
        $post  = KelasModel::where($where)->first();
     
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
    public function destroy($id_kelas)
    {
        $post = KelasModel::where('id_kelas', '=', $id_kelas)->delete();
     
        return response()->json($post);
    }
}
