<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Data User',
            'menuTataUsahaUser' => "active",
            'user' => User::orderBy('role', 'asc')->get(),
        );
        return view('tataUsaha/user/index', $data);
    }

    public function create(){
        $data = array(
            'title' => 'Tambah Data User',
            'menuTataUsahaUser' => "active"
        );
        return view('tataUsaha/user/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:8',

        ],[
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.unique' => 'Email Sudah Ada ',
            'role.required' => 'role Harus Di Pilih',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.confirmed' => 'Password Konfirmasi Tidak Sama',
            'password.min' => 'Password Minimal 8 Karakter',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user')->with('success','Data Berhasil Ditambahkan');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user -> delete();

        return redirect()->route('user')->with('success','Data Berhasil Di Hapus');
    }
}
