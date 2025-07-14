@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user"></i>
    {{ $title }}
</h1>
<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('guru') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Nama:</strong><br>
                {{ $guru->nama }}
            </div>
            <div class="col-md-6">
                <strong>NIP:</strong><br>
                {{ $guru->nip }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>No Telepon:</strong><br>
                {{ $guru->no_telp }}
            </div>
            <div class="col-md-6">
                <strong>Alamat:</strong><br>
                {{ $guru->alamat }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Mata Pelajaran:</strong><br>
                {{ $guru->mapel->nama_mapel ?? '-' }}
            </div>
            <div class="col-md-6">
                <strong>Email (Login):</strong><br>
                {{ $guru->user->email ?? '-' }}
            </div>
        </div>
    </div>
</div>
@endsection
