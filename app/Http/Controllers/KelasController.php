<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Exports\KelasExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class KelasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'menuKelas' => 'active',
            'kelas' => Kelas::with('guru')->get(),
        ];

        return view('tatausaha/kelas/index', $data);
    }
    public function kepalaIndex()
    {
        $data = [
            'title' => 'Data Kelas',
            'menuKelasKepala' => 'active',
            'kelas' => Kelas::with('guru')->get(),
        ];

        return view('kepalasekolah/kelas/kelas', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kelas',
            'menuKelas' => 'active',
            'guru' => Guru::orderBy('nama')->get(),
        ];

        return view('tatausaha/kelas/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Kelas',
            'menuKelas' => 'active',
            'kelas' => Kelas::findOrFail($id),
            'guru' => Guru::orderBy('nama')->get(),
        ];

        return view('tatausaha/kelas/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas,' . $id,
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas')->with('success', 'Data kelas berhasil diubah');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas')->with('success', 'Data kelas berhasil dihapus');
    }
    public function excel()
    {
        return Excel::download(new KelasExport, 'data_kelas.xlsx');
    }

    public function pdf()
    {
        $kelas = Kelas::all();
        $pdf = Pdf::loadView('kepalasekolah/kelas/pdf', compact('kelas'));
        return $pdf->download('data_kelas.pdf');
    }
}
