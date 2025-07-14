@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-book"></i>
    {{ $title }}
</h1>
<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route ('mapelCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>
        <div>
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
                        <th>
                            <i class="fas fa-cogs"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $item)
                    <tr>
                        <td class="text-center">{{ $loop ->iteration }}</td>
                        <td>{{ $item->nama_mapel }}</td>
                        <td>{{ $item->jurusan->nama_jurusan ?? '-' }}</td>
                        <td>
                            <a href="{{ route('mapelEdit',$item->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit">
                                </i>
                            </a>
                            <form method="POST" action="{{ route('mapelDestroy', $item->id) }}"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
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
