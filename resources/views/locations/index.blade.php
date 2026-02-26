@extends('layouts.stisla')

@section('title', 'Location')

@section('content')
    <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Management Lokasi</h5>
                            <a href="{{ route('location.create') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-plus"></i> Tambah Lokasi
                            </a>
                        </div>

                        <div class="card-body">
                            {{-- Alert Success --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            {{-- Table Data --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th>Nama Lokasi</th>
                                            <th>Keterangan</th>
                                            <th style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($locations as $key => $item)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $item->nama_lokasi }}</td>
                                                <td>{{ $item->keterangan ?? '-' }}</td>
                                                <td>
                                                    <a href="{{ route('location.edit', $item->id) }}" 
                                                       class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="{{ route('location.destroy', $item->id) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                onclick="return confirm('Yakin hapus data?')" 
                                                                class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-3">
                                                    <i class="fas fa-inbox"></i> Data lokasi belum tersedia
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
            <h1>Management Location</h1>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
                        <h4>Lokasi Asset</h4>
                        <a href="{{ route('location.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add new location
                        </a>
                    </div>

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

                        {{-- Table Data --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama Lokasi</th>
                                        <th>Keterangan</th>
                                        <th style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($locations as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $item->nama_lokasi }}</td>
                                            <td>{{ $item->keterangan ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('location.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="{{ route('location.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-3">
                                                <i class="fas fa-inbox"></i> Data lokasi belum tersedia
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