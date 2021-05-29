<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nama_guru', 'no_tlpn', 'nik', 'jenis_kelamin', 'agama', 'alamat', 'lulusan', 'universitas', 'kewarganegaraan'];
    protected $dates = ['created_at', 'updated_at'];
}
