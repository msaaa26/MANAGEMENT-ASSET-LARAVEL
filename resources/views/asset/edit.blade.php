@extends('layouts.stisla')

@section('title', 'Edit Asset')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Edit Asset</h1>

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
                            </div>
                        @endif
                        <form action="{{ route('asset.update', $aset->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Asset</label>
                                        <input type="text" name="kode_aset"
                                            class="form-control @error('kode_aset') is-invalid @enderror"
                                            value="{{ old('kode_aset', $aset->kode_aset) }}" placeholder="Contoh: AST001"
                                            required>

                                        @error('kode_aset')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Asset</label>
                                        <input type="text" name="nama_aset"
                                            class="form-control @error('nama_aset') is-invalid @enderror"
                                            value="{{ old('nama_aset', $aset->nama_aset) }}"
                                            placeholder="Masukkan nama asset" required>

                                        @error('nama_aset')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $aset->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <select name="location_id"
                                            class="form-control @error('location_id') is-invalid @enderror" required>
                                            <option value="">-- Pilih Lokasi --</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}" {{ old('location_id', $aset->location_id) == $location->id ? 'selected' : '' }}>
                                                    {{ $location->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('location_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kondisi</label>
                                        <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror"
                                            required>
                                            <option value="">-- Pilih Kondisi --</option>
                                            <option value="baik" {{ old('kondisi', $aset->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="maintenance" {{ old('kondisi', $aset->kondisi) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                            <option value="rusak" {{ old('kondisi', $aset->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                        </select>

                                        @error('kondisi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah"
                                            class="form-control @error('jumlah') is-invalid @enderror"
                                            value="{{ old('jumlah', $aset->jumlah) }}" placeholder="Masukkan jumlah asset"
                                            min="1" required>

                                        @error('jumlah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('asset.index') }}" class="btn btn-secondary">
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