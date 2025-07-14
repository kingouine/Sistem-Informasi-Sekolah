<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Data Siswa',
            'menuSiswa' => 'active',
            'siswa' => Siswa::with(['user', 'kelas'])->get(),
        ];
        return view('tatausaha/siswa/index', $data);
    }

    public function kepsekIndex(){
        if (Auth::user()->role !== 'KepalaSekolah') {
        return redirect()->route('dashboard')->with('error', 'Akses ditolak.');
        }

        $data = [
            'title' => 'Data Siswa',
            'menuSiswaKepsek' => 'active',
            'siswa' => Siswa::with(['user', 'kelas'])->orderBy('nama')->get(),
        ];

        return view('kepalasekolah/siswa/siswa', $data);
    }

    public function create() {
        $data = [
            'title' => 'Tambah Data Siswa',
            'menuSiswa' => 'active',
            'users' => User::where('role', 'Siswa')->orderBy('nama')->get(),
            'kelas' => Kelas::orderBy('nama_kelas')->get()
        ];
        return view('tatausaha/siswa/create', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',    
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis',
            'kelas_id' => 'required|exists:kelas,id',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id) {
        $siswa = Siswa::with('user')->findOrFail($id);

        $data = [
            'title' => 'Edit Data Siswa',
            'menuSiswa' => 'active',
            'siswa' => $siswa,
            'kelas' => Kelas::orderBy('nama_kelas')->get()
        ];
    
        return view('tatausaha/siswa/edit', $data);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas,nis,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string'
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil diubah');
    }

    public function destroy($id) {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa')->with('success', 'Data siswa berhasil dihapus');
    }

    public function show($id) {
        $data = [
            'title' => 'Detail Profil Siswa',
            'siswa' => Siswa::with(['user', 'kelas'])->findOrFail($id),
        ];
        return view('tatausaha/siswa/show', $data);
    }

    public function getByKelas(Request $request)
{
    $siswa = Siswa::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->get()
                ->map(function ($s) {
                    return [
                        'id' => $s->id,
                        'nama' => $s->user->nama ?? $s->nama, 
                    ];
                });

    return response()->json($siswa);
}

public function exportPdf()
{
    $siswa = Siswa::with(['user', 'kelas'])->get();
    $pdf = Pdf::loadView('kepalasekolah/siswa/pdf', compact('siswa'));
    return $pdf->download('data-siswa.pdf');
}

public function exportExcel()
{
    return Excel::download(new SiswaExport, 'data-siswa.xlsx');
}


}
