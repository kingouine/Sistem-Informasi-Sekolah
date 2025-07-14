<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Exports\GuruExport;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'menuGuru' => 'active',
            'guru' => Guru::with(['user', 'mapel'])->get(),
        ];

        return view('tatausaha/guru/index', $data);
    }

    public function kepalaIndex()
    {
        $data = [
            'title' => 'Data Guru',
            'menuGuruKepala' => 'active',
            'guru' => Guru::with(['user', 'mapel'])->get(),
        ];

    return view('kepalasekolah/guru/guru', $data);
}   

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Guru',
            'menuGuru' => 'active',
            'users' => User::where('role', 'Guru')->orderBy('nama')->get(),
            'mapel' => MataPelajaran::orderBy('nama_mapel')->get(),
        ];

        return view('tatausaha/guru/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'nama' => 'required|string',
            'nip' => 'required|string|unique:gurus,nip',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::with('user', 'mapel')->findOrFail($id);

        $data = [
            'title' => 'Edit Data Guru',
            'menuGuru' => 'active',
            'guru' => $guru,
            'mapel' => MataPelajaran::orderBy('nama_mapel')->get(),
            'users' => User::orderBy('nama')->get()
         ];
        return view('tatausaha/guru/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus,nip,' . $id,
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru')->with('success', 'Data guru berhasil diubah');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru')->with('success', 'Data guru berhasil dihapus');
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Profil Guru',
            'guru' => Guru::with(['user', 'mapel'])->findOrFail($id)
        ];
        return view('tatausaha/guru/show', $data);
    }

    public function excel()
    {
        return Excel::download(new GuruExport, 'data_guru.xlsx');
    }

    public function pdf()
    {
        $guru = Guru::with(['user', 'mapel'])->get();
        $pdf = Pdf::loadView('kepalasekolah/guru/pdf', compact('guru'));
        return $pdf->download('data_guru.pdf');
    }
}
