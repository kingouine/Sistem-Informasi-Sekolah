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
        <form action="{{ route('nilaiStore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Pilih Kelas</label>
                <select id="kelas_id" class="form-control">
                    <option selected disabled>-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-control" required>
                    <option selected disabled>-- Pilih Siswa --</option>
                </select>
            </div>

            {{-- Nama Guru --}}
            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" class="form-control" value="{{ $guru->nama }}" readonly>
                <input type="hidden" name="guru_id" value="{{ $guru->id }}">
            </div>


            {{-- Mata Pelajaran --}}
            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" value="{{ $mapel->first()->nama_mapel }}" readonly>
                <input type="hidden" name="mapel_id" value="{{ $mapel->first()->id }}">
            </div>

            {{-- Nilai Tugas --}}
            <div class="mb-3">
                <label>Nilai Tugas</label>
                <input type="number" name="nilai_tugas" class="form-control @error('nilai_tugas') is-invalid @enderror"
                    min="0" max="100">
                @error('nilai_tugas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Nilai UTS --}}
            <div class="mb-3">
                <label>Nilai UTS</label>
                <input type="number" name="nilai_uts" class="form-control @error('nilai_uts') is-invalid @enderror"
                    min="0" max="100">
                @error('nilai_uts') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Nilai UAS --}}
            <div class="mb-3">
                <label>Nilai UAS</label>
                <input type="number" name="nilai_uas" class="form-control @error('nilai_uas') is-invalid @enderror"
                    min="0" max="100">
                @error('nilai_uas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#kelas_id').change(function () {
        let kelasId = $(this).val();

        $.ajax({
            url: "{{ route('siswaByKelas') }}",
            type: "GET",
            data: {
                kelas_id: kelasId
            },
            success: function (data) {
                let siswaSelect = $('#siswa_id');
                siswaSelect.empty();
                siswaSelect.append('<option selected disabled>-- Pilih Siswa --</option>');
                data.forEach(function (siswa) {
                    siswaSelect.append(
                    `<option value="${siswa.id}">${siswa.nama}</option>`);
                });
            }
        });
    });

</script>
@endpush
