@extends('layout.app')

@section('content')
   <h1 class="h3 mb-4 text-gray-800">
   <i class="fas fa-edit"></i>
   {{ $title }}
</h1>
<div class="card">
<div class="card-header bg-primary">
        <a href="{{ route('mapel') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    <div>
    </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mapelUpdate', $mapel->id) }}" method="post">
                                @csrf
                            <div class="row mb-2">

                            <div class="col-8">
                                    <label class="form-label">
                                        <span class="text-danger">*</span>
                                        Nama Mata Pelajaran :
                                </label>
                                <input type name="nama_mapel" rows="5" class="form-control @error('nama_mapel') is-invalid
                                    @enderror" value="{{ $mapel->nama_mapel }}"></input>
                                    @error('nama_mapel')
                                    
                                    <small class="text-danger">
                                    {{ $message }}
                                    </small>
                                    @enderror
                                </div>

                            <div class="col-8">
                                    <label class="form-label">
                                        <span class="text-danger">*</span>
                                        Jurusan :
                                </label>
                                <input type="text" value="{{ $mapel->jurusan->nama_jurusan }}" class="form-control" disabled>

                                </div>

                            </div>
                            <div>
                            </div>
                            <div>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-save">
                            </i>
                            Simpan
                        </button>
                    </div>
                    </form>
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