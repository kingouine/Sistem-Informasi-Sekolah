@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-book"></i>
    {{ $title }}
</h1>
<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
        </div>
        <div>
            <a href="{{ route('mapelExportExcel') }}" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="{{ route('mapelExportPdf') }}" class="btn btn-sm btn-danger" target='___blank'>
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $item)
                    <tr>
                        <td class="text-center">{{ $loop ->iteration }}</td>
                        <td>{{ $item->nama_mapel }}</td>
                        <td>{{ $item->jurusan->nama_jurusan ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">

    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
