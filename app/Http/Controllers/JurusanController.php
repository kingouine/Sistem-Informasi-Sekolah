<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Data User',
            'menuTataUsahaJurusan' => "active",
            'jurusan' => Jurusan::orderBy('nama_jurusan', 'asc')->get(),
        );
        return view('tatausaha/jurusan/index', $data);
    }

    public function create(){
        $data = array(
            'title' => 'Tambah Data Jurusan',
            'menuTataUsahaJurusan' => "active"
        );
        return view('tatausaha/jurusan/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nama_jurusan' => 'required',

        ],[
            'nama_jurusan.required' => 'Nama Jurusan Tidak Boleh Kosong',
        ]);

        $jurusan = new Jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->route('jurusan')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = array(
            'title' => 'Ubah Data Jurusan',
            'menuTataUsahaJurusan' => "active",
            'jurusan'  => Jurusan::findOrFail($id),
        );
        return view('tatausaha/jurusan/edit', $data);
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'nama_jurusan' => 'required',
        ],[
            'nama_jurusan.required' => 'Nama Jurusan Tidak Boleh Kosong',
        ]);
    
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
    
        return redirect()->route('jurusan')->with('success','Data Berhasil Di Update');
    }
    

    public function destroy($id) {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan -> delete();

        return redirect()->route('jurusan')->with('success','Data Berhasil Di Hapus');
    }
}
