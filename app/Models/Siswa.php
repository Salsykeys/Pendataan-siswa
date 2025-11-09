<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Siswa extends Model
{
    protected $table = 'siswa';
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'kelas_id'
    ];

    public function kelas () {
        return $this->belongsTo(Kelas::class);
    }
}
