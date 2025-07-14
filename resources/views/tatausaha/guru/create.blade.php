@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus-circle"></i> {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('guru') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('guruStore') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                    <option disabled selected>-- Pilih User --</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->nama }} ({{ $u->email }})</option>
                    @endforeach
                </select>
                @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
                @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror">
                    <option disabled selected>-- Pilih Mapel --</option>
                    @foreach ($mapel as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                    @endforeach
                </select>
                @error('mapel_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp') }}">
                @error('no_telp') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
