<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Exports\MapelExport;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Data Mata Pelajaran',
            'menuTataUsahaMapel' => "active",
            'mapel' => MataPelajaran::with('jurusan')->get(),
        );
        return view('tatausaha/mapel/index', $data);
    }
    public function kepalaIndex()
    {
        $data = [
            'title' => 'Data Mata Pelajaran',
            'menuMapelKepala' => 'active',
            'mapel' => MataPelajaran::all(),
        ];

    return view('kepalasekolah/mapel/maple', $data);
    }   

    public function create(){
        $data = array(
            'title' => 'Tambah Data Mata Pelajaran',
            'menuTataUsahaMapel' => "active",
            'jurusan' => Jurusan::orderBy('nama_jurusan', 'asc')->get(),
        );
        return view('tatausaha/mapel/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'jurusan_id' => 'required',
            'nama_mapel' => 'required',

        ],[
            'jurusan_id.required' => 'Nama Jurusan Tidak Boleh Kosong',
            'nama_mapel.required' => 'Nama Mata Pelajaran Tidak Boleh Kosong',
        ]);
        $mapel = new MataPelajaran();
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->jurusan_id = $request->jurusan_id;
        $mapel->save();

        return redirect()->route('mapel')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = array(
            'title' => 'Ubah Data Mata Pelajaran',
            'menuTataUsahaMapel' => "active",
            'mapel'  => MataPelajaran::findOrFail($id),
        );
        return view('tatausaha/mapel/edit', $data);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'nama_mapel' => 'required',
        ],[
            'nama_mapel.required' => 'Nama Mata Pelajaran Tidak Boleh Kosong',
        ]);
    
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();
    
        return redirect()->route('mapel')->with('success','Data Berhasil Di Update');
    }
    

    public function destroy($id) {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel -> delete();

        return redirect()->route('mapel')->with('success','Data Berhasil Di Hapus');
    }
    public function excel()
    {
        return Excel::download(new MapelExport, 'data_mata_pelajaran.xlsx');
    }

    public function pdf()
    {
        $mapel = MataPelajaran::all();
        $pdf = Pdf::loadView('kepalasekolah/mapel/pdf', compact('mapel'));
        return $pdf->download('data_mata_pelajaran.pdf');
    }
}
