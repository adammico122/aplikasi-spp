<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IuranModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'iuran';
    protected $primaryKey = 'id_iuran';
    protected $fillable = [ 'total_bayar', 'bulan_bayar', 'tahun_bayar', 'keterangan_bayar' ];
    protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];
}
