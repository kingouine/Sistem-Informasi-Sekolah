<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Nilai::with(['siswa', 'guru', 'mapel'])
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Siswa' => $item->siswa->nama ?? '-',
                    'Nama Guru' => $item->guru->nama ?? '-',
                    'Mata Pelajaran' => $item->mapel->nama_mapel ?? '-',
                    'Rata-Rata' => number_format(($item->nilai_tugas + $item->nilai_uts + $item->nilai_uas) / 3, 2),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Nama Guru',
            'Mata Pelajaran',
            'Rata-Rata'
        ];
    }
}
