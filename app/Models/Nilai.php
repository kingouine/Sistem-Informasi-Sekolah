<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';

    protected $fillable = [
        'siswa_id',
        'guru_id',
        'mapel_id',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
    ];

    // Relasi ke tabel Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke tabel Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Relasi ke tabel Mata Pelajaran
    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }
}
