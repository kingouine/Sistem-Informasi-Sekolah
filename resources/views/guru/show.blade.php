@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-eye"></i> {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <span>Detail Nilai Siswa</span>
        <a href="{{ route('nilai') }}" class="btn btn-sm btn-light">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Siswa</th>
                <td>{{ $nilai->siswa->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $nilai->siswa->kelas->nama_kelas ?? '-' }}</td>
            </tr>
            <tr>
                <th>NIS</th>
                <td>{{ $nilai->siswa->nis ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nama Guru</th>
                <td>{{ $nilai->guru->nama ?? '-' }}</td>
            </tr>
            <tr>
                <th>Mapel</th>
                <td>{{ $nilai->mapel->nama_mapel ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nilai Tugas</th>
                <td>{{ $nilai->nilai_tugas }}</td>
            </tr>
            <tr>
                <th>Nilai UTS</th>
                <td>{{ $nilai->nilai_uts }}</td>
            </tr>
            <tr>
                <th>Nilai UAS</th>
                <td>{{ $nilai->nilai_uas }}</td>
            </tr>
            <tr>
                <th>Rata-Rata</th>
                <td>
                    {{ number_format(($nilai->nilai_tugas + $nilai->nilai_uts + $nilai->nilai_uas) / 3, 2) }}
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
