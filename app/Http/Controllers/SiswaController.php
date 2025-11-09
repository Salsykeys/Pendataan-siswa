<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // Read daftar siswa
    public function index() {
        $dataSiswa = Siswa::with('kelas')->get();
        return view('siswa.index', ['semuaSiswa' => $dataSiswa]);
    }

    // Create
    public function create() {
        $dataKelas = Kelas::all();
        return view('siswa.create', ['semuaKelas' => $dataKelas]);
    }

    // Store
    public function store(Request $request) {
        // Validasi
        $request->validate([
            'nis' => 'required|string|unique:siswa,nis|max:10',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date'
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('Success', 'data siswa berhasil ditambahkan');
    }

    // Edit
    public function edit(Siswa $siswa) {
        $dataKelas = Kelas::all();
        return view('siswa.edit', ['siswa' => $siswa, 'semuaKelas' => $dataKelas]);
    }

    // Update
    public function update(Request $request, Siswa $siswa) {
        $request->validate([
            'nis' => 'required|string|max:10|unique:siswa,nis',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas_id' => 'required|exists:kelas,id',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date'
        ]);

        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('Success', 'Data Berhasil diubah');
    }

    // Delete
    public function destroy(Siswa $siswa) {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('Success', 'Data berhasil dihapus');
    }
}
