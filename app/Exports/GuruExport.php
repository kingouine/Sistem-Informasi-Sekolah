<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Guru::with('user', 'mapel')->get()->map(function ($guru) {
            return [
                'Nama' => $guru->nama,
                'Nip' => $guru->nip,
                'Email' => $guru->user->email ?? '-',
                'No. Telepon' => $guru->no_telp,
                'Alamat' => $guru->alamat,
                'Mata Pelajaran' => $guru->mapel->nama_mapel ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama','NIP', 'Email', 'No. Telepon', 'Alamat', 'Mata Pelajaran'];
    }
}
