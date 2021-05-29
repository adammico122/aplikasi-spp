<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KelasModel;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = ['nama_siswa', 'id_kelas', 'nik', 'no_tlp', 'jenis_kelamin', 'agama', 'alamat', 'tanggal_lahir', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu'];
    protected $dates = ['created_at', 'updated_at'];

    public function kelas()
    {
        return $this->belongsTo(KelasModel::class, 'id_kelas');
    }
}
