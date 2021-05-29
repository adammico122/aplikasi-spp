<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\{GuruModel, IuranModel, KelasModel, SiswaModel, TransaksiModel};

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $guru = GuruModel::get();
        if($request->ajax()){
            return datatables()->of($guru)
                        ->addColumn('action', function($data){ // Action Adalah Nama Dari Array Penampung Button
                            $button = '<a href="/guru/'.$data->id_guru.'/edit" data-original-title="Edit" class="edit btn btn-icon btn-primary"><i class="ik ik-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="/guru/'.$data->id_guru.'/detail" data-original-title="Detail" class="detail btn btn-icon btn-success"><i class="ik ik-file-text"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_guru.'" class="delete btn btn-icon btn-danger"><i class="ik ik-x"></i></button>';
                            return $button;
                        })
                ->rawColumns(['action']) // rawColumns Gunanya Untuk Merubah $button Menjadi Array Agar Tidak Dianggap String Biasa
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.guru.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post   =   GuruModel::Create(
            [
                'nama_guru'         => $request->nama_guru,
                'no_tlpn'           => $request->no_tlpn,
                'nik'               => $request->nik,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'agama'             => $request->agama,
                'alamat'            => $request->alamat,
                'lulusan'           => $request->lulusan,
                'universitas'       => $request->universitas,
                'kewarganegaraan'   => $request->kewarganegaraan,
            ]); 

            return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_guru)
    {
        $data = GuruModel::where('id_guru', '=', $id_guru)->first();

        return view('dashboard.guru.detail', ['guru' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_guru)
    {
        $guru  = GuruModel::where('guru.id_guru', $id_guru)
        ->first();
        
        return view('dashboard.guru.edit', ['guru' => $guru]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_guru)
    {
        $data   =   GuruModel::where('id_guru',$id_guru)->Update(
            [
                'nama_guru'         => $request->nama_guru,
                'nik'               => $request->nik,
                'no_tlpn'           => $request->no_tlpn,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'agama'             => $request->agama,
                'alamat'            => $request->alamat,
                'lulusan'           => $request->lulusan,
                'universitas'       => $request->universitas,
                'kewarganegaraan'   => $request->kewarganegaraan,
            ]); 
                    return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_guru)
    {
        $post = GuruModel::where('id_guru', '=', $id_guru)->delete();
     
        return response()->json($post);
    }
}
