@extends('layouts.stisla')

@section('title', 'Edit Category')

@section('content')
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Edit Kategori</h5>
                </div>

                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text"
                                       name="nama_kategori"
                                       class="form-control @error('nama_kategori') is-invalid @enderror"
                                       value="{{ old('nama_kategori', $category->nama_kategori) }}"
                                       placeholder="Masukkan nama kategori">

                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-warning">
                                    Update
                                </button>
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">
                                    Kembali
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
            <h1>Edit Category</h1>

        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card shadow-sm">


                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" name="nama_kategori"
                                    class="form-control @error('nama_kategori') is-invalid @enderror"
                                    value="{{ old('nama_kategori', $category->nama_kategori) }}"
                                    placeholder="Masukkan nama kategori">

                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary mr-2">
                                    Update
                                </button>
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection