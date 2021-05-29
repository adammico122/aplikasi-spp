<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{GuruModel, IuranModel, KelasModel, SiswaModel, TransaksiModel};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bulan_ini = date('Y-m-d',strtotime('+0 days'));

        $data = [ 'all_transaksi' => TransaksiModel::count(),
                  'bot_tran'      => TransaksiModel::sum('jmlh_pembayaran'),

                  'siswa_all'     => SiswaModel::count(),
                  'siswa_bot'     => SiswaModel::where('created_at', '<', $bulan_ini)->count(),

                  'iuran_bot'     => IuranModel::count(),
                  'iuran_top'     => IuranModel::sum('total_bayar'),

                  'guru_top'      => GuruModel::count(),
                  'guru_bot'      => GuruModel::where('created_at', '<', $bulan_ini)->count()

        ];
        return view('dashboard.index', $data);
    }
}
