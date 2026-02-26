@extends('layouts.stisla')

@section('title', 'Edit Lokasi')

@section('content')
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Edit Lokasi</h5>
                    </div>

                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('location.update', $location->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama Lokasi</label>
                                <input type="text"
                                       name="nama_lokasi"
                                       class="form-control @error('nama_lokasi') is-invalid @enderror"
                                       value="{{ old('nama_lokasi', $location->nama_lokasi) }}"
                                       placeholder="Masukkan nama lokasi"
                                       required>

                                @error('nama_lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan"
                                          class="form-control @error('keterangan') is-invalid @enderror"
                                          placeholder="Masukkan keterangan (opsional)"
                                          rows="4">{{ old('keterangan', $location->keterangan) }}</textarea>

                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-save"></i> Perbarui
                                </button>
                                <a href="{{ route('location.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div> -->

    <section class="section">
        <div class="section-header">
            <h1>Edit Current Location</h1>

        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card shadow-sm">


                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('location.update', $location->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama Lokasi</label>
                                <input type="text" name="nama_lokasi"
                                    class="form-control @error('nama_lokasi') is-invalid @enderror"
                                    value="{{ old('nama_lokasi', $location->nama_lokasi) }}"
                                    placeholder="Masukkan nama lokasi" required>

                                @error('nama_lokasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                    placeholder="Masukkan keterangan (opsional)"
                                    rows="4">{{ old('keterangan', $location->keterangan) }}</textarea>

                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('location.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection