@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-body">
        <a href="{{ route('siswa') }}" class="btn btn-sm btn-secondary mb-3">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td>{{ $siswa->nama }}</td>
            </tr>
            <tr>
                <th>NIS</th>
                <td>{{ $siswa->nis }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $siswa->no_telp }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $siswa->alamat }}</td>
            </tr>
            <tr>
                <th>Username (User Login)</th>
                <td>{{ $siswa->user->username ?? '-' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
