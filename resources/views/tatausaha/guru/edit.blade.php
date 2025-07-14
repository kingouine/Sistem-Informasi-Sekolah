@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit"></i> {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('guru') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('guruUpdate', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control" disabled>
                    <option value="{{ $guru->user->id }}">
                        {{ $guru->user->nama }} ({{ $guru->user->email }})
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $guru->nama) }}">
                @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}">
                @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <select name="mapel_id" class="form-control @error('mapel_id') is-invalid @enderror">
                    <option disabled selected>-- Pilih Mapel --</option>
                    @foreach ($mapel as $m)
                        <option value="{{ $m->id }}" {{ $guru->mapel_id == $m->id ? 'selected' : '' }}>
                            {{ $m->nama_mapel }}
                        </option>
                    @endforeach
                </select>
                @error('mapel_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp', $guru->no_telp) }}">
                @error('no_telp') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', $guru->alamat) }}</textarea>
                @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
