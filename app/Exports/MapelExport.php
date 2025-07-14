<?php

namespace App\Exports;

use App\Models\MataPelajaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MapelExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return MataPelajaran::all()->map(function ($mapel) {
            return [
                'Nama Mata Pelajaran' => $mapel->nama_mapel,
                'Jurusan' => $mapel->jurusan->nama_jurusan,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama Mata Pelajaran', 'Jurusan'];
    }
}
