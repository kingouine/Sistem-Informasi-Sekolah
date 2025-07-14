@extends('layout.app')

@section('content')
   <h1 class="h3 mb-4 text-gray-800">
   <i class="fas fa-edit"></i>
   {{ $title }}
</h1>
<div class="card">
<div class="card-header bg-warning">
        <a href="{{ route('jurusan') }}" class="btn btn-sm btn-danger">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    <div>
    </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('jurusanUpdate', $jurusan->id) }}" method="post">
                                @csrf
                            <div class="row mb-2">
                            <div class="col-8">
                                    <label class="form-label">
                                        <span class="text-danger">*</span>
                                        Nama Jurusan :
                                </label>
                                    <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid
                                    @enderror" value="{{ $jurusan->nama_jurusan }}">
                                    
                                    @error('nama_jurusan')
                                    <small class="text-danger">
                                    {{ $message }}
                                    </small>
                                    @enderror
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