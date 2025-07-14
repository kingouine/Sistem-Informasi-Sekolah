@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('kelas') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('kelasStore') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama Kelas:
                    </label>
                    <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" value="{{ old('nama_kelas') }}">
                    @error('nama_kelas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">
                        <span class="text-danger">*</span> Pilih Wali Kelas:
                    </label>
                    <select name="guru_id" class="form-control @error('guru_id') is-invalid @enderror">
                        <option selected disabled>-- Pilih Guru --</option>
                        @foreach ($guru as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
