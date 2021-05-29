<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_siswa', 'id_iuran', 'jmlh_pembayaran', 'sisa', 'status', 'tanggal_pembayaran', 'nama_petugas'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
