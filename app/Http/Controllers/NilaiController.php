<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\NilaiSiswaExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = $user->guru;
        
        if (!$guru) {
            return redirect()->route('dashboard')->with('error', 'Data guru tidak ditemukan.');
        }
        
        $data = [
            'title' => 'Data Nilai Siswa',
            'menuNilai' => 'active',
            'nilai' => Nilai::with(['siswa', 'guru', 'mapel'])
                        ->where('guru_id', $guru->id)
                        ->get(),
        ];
        return view('guru/index', $data);
    }

    public function nilaiSaya()
    {
        $siswa = Auth::user()->siswa;

        if (!$siswa) {
            return redirect()->route('dashboard')->with('error', 'Data siswa tidak ditemukan untuk akun ini.');
}

         $data = [
            'title' => 'Nilai Saya',
            'menuNilaiSiswa' => 'active',
            'kelas' => Kelas::all(),
            'nilai' => Nilai::with(['guru', 'mapel'])
                ->where('siswa_id', $siswa->id)
                ->get(),
            ];
        return view('siswa/index', $data);
        }

    public function nilaiSemua()
    {
        if (Auth::user()->role !== 'KepalaSekolah') {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
    }

    $data = [
        'title' => 'Rekap Nilai Semua Siswa',
        'menuNilaiKepsek' => 'active',
        'nilai' => Nilai::with(['siswa.kelas', 'guru', 'mapel'])->get(),
    ];

    return view('kepalasekolah/nilai/nilai', $data);
        }

    public function create()
    {
    $user = Auth::user();
    $guru = $user->guru;

    if (!$guru) {
        return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki data guru.');
    }
        $data = [
            'title' => 'Input Nilai Siswa',
            'menuNilai' => 'active',
            'siswa' => Siswa::with(['user', 'kelas'])->orderBy('nama')->get(),
            'guru' => $guru,
            'mapel' => MataPelajaran::where('id', $guru->mapel_id)->get(),
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ];

        return view('guru/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::create($request->all());

        return redirect()->route('nilai')->with('success', 'Data nilai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Nilai Siswa',
            'menuNilai' => 'active',
            'nilai' => Nilai::findOrFail($id),
            'siswa' => Siswa::with('user')->orderBy('nama')->get(),
            'guru' => Guru::with('user')->orderBy('nama')->get(),
            'mapel' => MataPelajaran::orderBy('nama_mapel')->get(),
        ];

        return view('guru/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('nilai')->with('success', 'Data nilai berhasil diubah');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai')->with('success', 'Data nilai berhasil dihapus');
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Nilai Siswa',
            'nilai' => Nilai::with(['siswa', 'guru', 'mapel'])->findOrFail($id),
        ];
        return view('guru/show', $data);
    }

    public function exportExcel()
    {
        return Excel::download(new NilaiExport, 'data_nilai.xlsx');
    }

    public function exportPdf()
    {
        $nilai = Nilai::with(['siswa', 'guru', 'mapel'])->get();
        $pdf = Pdf::loadView('kepalasekolah/nilai/pdf', compact('nilai'));
        return $pdf->download('data_nilai.pdf');
    }

    public function exportExcelSiswa()
{
    $siswaId = auth()->user()->siswa->id;
    return Excel::download(new NilaiSiswaExport($siswaId), 'nilai_siswa.xlsx');
}

public function exportPdfSiswa()
{
    $siswaId = auth()->user()->siswa->id;
    $data = Nilai::with(['siswa', 'guru', 'mapel'])
        ->where('siswa_id', $siswaId)->get();

    $pdf = Pdf::loadView('siswa/pdf', compact('data'));
    return $pdf->download('nilai_siswa.pdf');
}
}
