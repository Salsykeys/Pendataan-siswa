<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{

    public function index() {
        // Read
        $dataKelas = kelas::all();
        return view('kelas.index', ['semuaKelas' => $dataKelas]);
    }
    public function create() {
        return view('kelas.create');
    }

    public function store(Request $request) {
        // validasi
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255'
        ]);

        kelas::create($request->all());

    return redirect()->route('kelas.index')->with('Success', 'data kelas berhasil ditambahkan');
    }

    // Edit
    public function edit(Kelas $kela) {
        return view('kelas.edit', ['kelas' => $kela]);
    }

    public function update(Request $request, Kelas $kela) {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255'
        ]);
        $kela->update($request ->all());

        return redirect()->route('kelas.index')->with('Success', 'Data kelas berhasil diubah');
    }

    public function destroy(Kelas $kela) {
        $kela -> delete();

        return redirect()->route('kelas.index')->with('Success', 'Data kelas berhasil dihaus');
    }
}
