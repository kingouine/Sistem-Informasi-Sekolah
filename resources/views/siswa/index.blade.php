@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-star-half-alt"></i> Nilai Saya
</h1>

<div class="card">
<div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
        </div>
        <div>
            <a href="{{ route('nilaiExportExcelSiswa') }}" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="{{ route('nilaiExportPdfSiswa') }}" class="btn btn-sm btn-danger" target="_blank">
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div>
        </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru Pengampu</th>
                        <th>Nilai Tugas</th>
                        <th>Nilai UTS</th>
                        <th>Nilai UAS</th>
                        <th>Rata-Rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mapel->nama_mapel ?? '-' }}</td>
                        <td>{{ $item->guru->nama ?? '-' }}</td>
                        <td>{{ $item->nilai_tugas }}</td>
                        <td>{{ $item->nilai_uts }}</td>
                        <td>{{ $item->nilai_uas }}</td>
                        <td>
                            {{ number_format(($item->nilai_tugas + $item->nilai_uts + $item->nilai_uas) / 3, 2) }}
                        </td>
                    </tr>
                    @endforeach

                    @if ($nilai->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data nilai.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
