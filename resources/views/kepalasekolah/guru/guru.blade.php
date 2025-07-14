@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-chalkboard-teacher"></i> {{ $title }}
</h1>

<div class="card">
<div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
        </div>
        <div>
            <a href="{{ route('guruExportExcel') }}" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="{{ route('guruExportPdf') }}" class="btn btn-sm btn-danger" target="_blank">
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Mata Pelajaran</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $g)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $g->nama }}</td>
                        <td>{{ $g->nip }}</td>
                        <td>{{ $g->user->email ?? '-' }}</td>
                        <td>{{ $g->mapel->nama_mapel ?? '-' }}</td>
                        <td>{{ $g->no_telp }}</td>
                        <td>{{ $g->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
