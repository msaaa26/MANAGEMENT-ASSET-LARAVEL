@extends('layouts.stisla')


@section('title', 'Kategori')

@section('content')
    <!-- <div class="container-fluid">

                <div class="row">

                    <div class="col-12">

                        <div class="card shadow-sm">


                            <div class="card-body">

                                {{-- Alert Success --}}
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                {{-- Form Tambah --}}
                                <form action="{{ route('category.store') }}" method="POST" class="mb-4">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Kategori</label>
                                            <input type="text" 
                                                   name="nama_kategori" 
                                                   class="form-control @error('nama_kategori') is-invalid @enderror"
                                                   placeholder="Masukkan nama kategori">

                                            @error('nama_kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-2 align-self-end">
                                            <button type="submit" class="btn btn-success w-100">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                {{-- Table Data --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Kategori</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $category->nama_kategori }}</td>
                                                    <td>
                                                        <a href="{{ route('category.edit', $category->id) }}" 
                                                           class="btn btn-warning btn-sm">
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('category.destroy', $category->id) }}" 
                                                              method="POST" 
                                                              class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                    onclick="return confirm('Yakin hapus data?')" 
                                                                    class="btn btn-danger btn-sm">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        Data kategori belum tersedia
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div> -->
    <section class="section">
        <div class="section-header">
            <h1>Management Category</h1>

        </div>
        <div class="row">

            <div class="col-12">

                <div class="card shadow-sm">


                    <div class="card-body">

                        {{-- Alert Success --}}

                        @if(session('success'))
                            <script>
                                // Gunakan window.onload atau document.addEventListener supaya pasti jalan pas halaman siap
                                document.addEventListener('DOMContentLoaded', function () {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: "{{ session('success') }}",
                                        
                                    });
                                });
                            </script>
                        @endif
                        {{-- Form Tambah --}}
                        <form action="{{ route('category.store') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Kategori</label>
                                    <input type="text" name="nama_kategori"
                                        class="form-control @error('nama_kategori') is-invalid @enderror"
                                        placeholder="Masukkan nama kategori">
                                </div>

                                <div class="col-md-2 d-grid">
                                    <button type="submit" class="btn btn-success" style="height: 42px;">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- Table Data --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Kategori</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->nama_kategori }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                                        class="btn btn-danger btn-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">
                                                <i class="fas fa-inbox"></i>
                                                Data kategori belum tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection