<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'kelas_id'
    ];

    public function siswa () {
        return $this->belongsTo(kelas::class);
    }
}
