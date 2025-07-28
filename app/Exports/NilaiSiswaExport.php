<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiSiswaExport implements FromCollection, WithHeadings
{
    protected $siswa_id;

    public function __construct($siswa_id)
    {
        $this->siswa_id = $siswa_id;
    }

    public function collection()
    {
        return Nilai::with(['siswa', 'guru', 'mapel'])
            ->where('siswa_id', $this->siswa_id)
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Siswa'       => $item->siswa->nama,
                    'Mata Pelajaran'   => $item->mapel->nama_mapel,
                    'Guru'             => $item->guru->nama,
                    'Tugas'            => $item->nilai_tugas,
                    'UTS'              => $item->nilai_uts,
                    'UAS'              => $item->nilai_uas,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa', 'Mata Pelajaran', 'Guru', 'Tugas', 'UTS', 'UAS'
        ];
    }
}
