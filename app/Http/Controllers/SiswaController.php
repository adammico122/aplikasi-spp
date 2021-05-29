<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\{GuruModel, IuranModel, KelasModel, SiswaModel, TransaksiModel};

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $siswa = SiswaModel::join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->get();
        $kelas = KelasModel::get();
        if($request->ajax()){
            return datatables()->of($siswa)
                        ->addColumn('action', function($data){ // Action Adalah Nama Dari Array Penampung Button
                            $button = '<a href="/siswa/'.$data->id_siswa.'/edit" data-original-title="Edit" class="edit btn btn-icon btn-primary"><i class="ik ik-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_siswa.'" class="delete btn btn-icon btn-danger"><i class="ik ik-x"></i></button>';     
                            return $button;
                        })
                ->rawColumns(['action']) // rawColumns Gunanya Untuk Merubah $button Menjadi Array Agar Tidak Dianggap String Biasa
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.siswa.list', [ 'kelas' => $kelas ]);
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
    public function getData(Request $request)
    {
        $response = DB::table('siswa')
        ->get();

        return response()->json($response);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $post   =   SiswaModel::Create(
                    [
                        'nama_siswa'        => $request->nama_siswa,
                        'id_kelas'          => $request->id_kelas,
                        'nik'               => $request->nik,
                        'no_tlp'            => $request->no_tlp,
                        'jenis_kelamin'     => $request->jenis_kelamin,
                        'agama'             => $request->agama,
                        'alamat'            => $request->alamat,
                        'tanggal_lahir'     => $request->tanggal_lahir,
                        'nama_ayah'         => $request->nama_ayah,
                        'nama_ibu'          => $request->nama_ibu,
                        'pekerjaan_ayah'    => $request->pekerjaan_ayah,
                        'pekerjaan_ibu'     => $request->pekerjaan_ibu,
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_siswa)
    {
        $siswa  = SiswaModel::where('siswa.id_siswa', $id_siswa)
        ->first();
        $kelas = KelasModel::get();
        
        return view('dashboard.siswa.edit', ['siswa' => $siswa], ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_siswa)
    {
        /* return response()->json([
            'sukses'    => $request->all()
        ]); */
        $post   =   SiswaModel::where('id_siswa',$id_siswa)->Update(
            [
                'nama_siswa'        => $request->nama_siswa,
                'id_kelas'          => $request->id_kelas,
                'nik'               => $request->nik,
                'no_tlp'            => $request->no_tlp,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'agama'             => $request->agama,
                'alamat'            => $request->alamat,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'nama_ayah'         => $request->nama_ayah,
                'nama_ibu'          => $request->nama_ibu,
                'pekerjaan_ayah'    => $request->pekerjaan_ayah,
                'pekerjaan_ibu'     => $request->pekerjaan_ibu,
            ]); 
                    return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_siswa)
    {
        $post = SiswaModel::where('id_siswa', '=', $id_siswa)->delete();
     
        return response()->json($post);
    }
}
