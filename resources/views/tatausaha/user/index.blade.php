@extends('layout.app')

@section('content')
   <h1 class="h3 mb-4 text-gray-800">
   <i class="fas fa-user"></i>
   {{ $title }}
</h1>
<div class="card">
<div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
    <div class="mb-1 mr-2">
    <a href="{{ route ('userCreate') }}" class="btn btn-sm btn-primary">
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>
                                                <i class="fas fa-cogs"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop ->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-center">
                                                <span>
                                                {{ $item->email }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                @if ($item->role == 'TataUsaha')
                                                    <span class="badge badge-dark">
                                                    {{ $item->role }}
                                                    </span>
                                                @elseif ($item->role == 'Siswa')
                                                    <span class="badge badge-dark">
                                                    {{ $item->role }}
                                                    </span>
                                                @elseif ($item->role == 'Guru')
                                                    <span class="badge badge-dark">
                                                    {{ $item->role }}
                                                    </span>
                                                @elseif ($item->role == 'WaliKelas')
                                                    <span class="badge badge-dark">
                                                    {{ $item->role }}
                                                    </span>
                                                @else ($item->role == 'KepalaSekolah')
                                                    <span class="badge badge-dark">
                                                    {{ $item->role }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                            <form method="POST" action="{{ route('userDestroy', $item->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger"
        onclick="return confirm('Yakin ingin menghapus data ini?')">
        <i class="fas fa-trash"></i>
    </button>
</form>
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