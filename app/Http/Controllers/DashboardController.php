<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = array(
            "title" => "Dashboard",
            "menuDashboard" => "active",
            'total_user' => User::count(),
            'total_tata_usaha' => User::where('role', 'TataUsaha')->count(),
            'total_siswa' => User::where('role', 'Siswa')->count(),
            'total_guru' => User::where('role', 'guru')->count(),
        );
        return view ('dashboard', $data);
    }

}
