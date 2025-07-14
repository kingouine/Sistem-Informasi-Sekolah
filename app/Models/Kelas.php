<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
