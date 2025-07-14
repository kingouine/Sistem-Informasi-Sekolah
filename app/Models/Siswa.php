<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['user_id', 'kelas_id', 'nama', 'nis', 'no_telp', 'alamat'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
