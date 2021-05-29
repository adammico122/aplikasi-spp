<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\{IuranModel, SiswaModel, TransaksiModel, KelasModel};

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = TransaksiModel::join('iuran', 'transaksi.id_iuran', '=', 'iuran.id_iuran')
        ->join('siswa', 'transaksi.id_siswa', '=', 'siswa.id_siswa')
        ->get();
        $iuran = IuranModel::get();
        $siswa = SiswaModel::get();
        $kelas = KelasModel::all();

        if($request->ajax()){
            return datatables()->of($transaksi)
                        ->addColumn('action', function($data){ // Action Adalah Nama Dari Array Penampung Button
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_transaksi.'" data-original-title="Edit" class="edit btn btn-icon btn-primary edit-post"><i class="ik ik-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id_transaksi.'" class="delete btn btn-icon btn-danger"><i class="ik ik-x"></i></button>';     
                            return $button;
                        })
                ->rawColumns(['action']) // rawColumns Gunanya Untuk Merubah $button Menjadi Array Agar Tidak Dianggap String Biasa
                ->addIndexColumn()
                ->make(true);
        }
        return view('dashboard.transaksi.list', compact('iuran', 'kelas', 'siswa'));
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
        $id = $request->id_transaksi;
        $post   =   TransaksiModel::updateOrCreate(['transaksi.id_transaksi' => $id],
                    [
                        'id_siswa'              => $request->get('id_siswa'),
                        'id_iuran'              => $request->get('id_iuran'),
                        'jmlh_pembayaran'       => $request->get('jmlh_pembayaran'),
                        'sisa'                  => $request->get('sisa'),
                        'status'                => $request->get('status'),
                        'tanggal_pembayaran'    => $request->get('tanggal_pembayaran'),
                        'nama_petugas'          => $request->get('nama_petugas')
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
    public function edit($id_transaksi)
    {
        $where = array('id_transaksi' => $id_transaksi);
        $post  = TransaksiModel::where($where)->first();
     
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
    public function destroy($id_transaksi)
    {
        $post = TransaksiModel::where('id_transaksi', '=', $id_transaksi)->delete();
     
        return response()->json($post);
    }
    public function ajax($id){
        $tesy = SiswaModel::orderBy('nama_siswa', 'asc')->where('id_kelas', '=', $id)->pluck('nama_siswa', 'id_siswa');

        return json_encode($tesy);
    }
}
