<?php

namespace App\Exports;

use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelasExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kelas::all()->map(function ($kelas) {
            return [
                'Nama Kelas' => $kelas->nama_kelas,
                'Wali Kelas' => $kelas->guru->nama,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama Kelas', 'Wali Kelas'];
    }
}
