<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::with('kelas')->get()->map(function ($s) {
            return [
                'nama' => $s->nama,
                'nis' => $s->nis,
                'kelas' => $s->kelas->nama_kelas ?? '-',
                'no_telepon' =>$s->no_telp,
                'alamat' => $s->alamat,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama', 'NIS', 'Kelas', 'No Telepon', 'Alamat'];
    }
}

