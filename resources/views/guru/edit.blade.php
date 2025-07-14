@extends('layout.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus-circle"></i> {{ $title }}
</h1>
<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('nilai') }}" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('nilaiUpdate', $nilai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" value="{{ $nilai->siswa->nama }}" disabled>
                <input type="hidden" name="siswa_id" value="{{ $nilai->siswa_id }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" class="form-control" value="{{ $nilai->siswa->kelas->nama_kelas }}" disabled>
                <input type="hidden" name="kelas_id" value="{{ $nilai->kelas_id }}">
            </div>

            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" class="form-control" value="{{ $nilai->guru->nama }}" disabled>
                <input type="hidden" name="guru_id" value="{{ $nilai->guru_id }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Pelajaran</label>
                <input type="text" class="form-control" value="{{ $nilai->mapel->nama_mapel }}" disabled>
                <input type="hidden" name="mapel_id" value="{{ $nilai->mapel_id }}">
            </div>

            <div class="mb-3">
                <label>Nilai Tugas</label>
                <input type="number" name="nilai_tugas" class="form-control" min="0" max="100"
                       value="{{ old('nilai_tugas', $nilai->nilai_tugas) }}">
                @error('nilai_tugas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Nilai UTS</label>
                <input type="number" name="nilai_uts" class="form-control" min="0" max="100"
                       value="{{ old('nilai_uts', $nilai->nilai_uts) }}">
                @error('nilai_uts') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Nilai UAS</label>
                <input type="number" name="nilai_uas" class="form-control" min="0" max="100"
                       value="{{ old('nilai_uas', $nilai->nilai_uas) }}">
                @error('nilai_uas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
