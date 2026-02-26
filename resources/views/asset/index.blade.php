@extends('layouts.stisla')

@section('title', 'Asset Management')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Management Asset</h1>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
                        <h4>Daftar Asset</h4>
                        <a href="{{ route('asset.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add New Asset
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
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Kode Asset</th>
                                        <th>Nama Asset</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Kondisi</th>
                                        <th style="width: 8%;">Jumlah</th>
                                        <th style="width: 18%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($asets as $key => $asset)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>
                                                <a href="{{ route('asset.show', $asset->id) }}" class="text-decoration-none"
                                                    title="View {{ $asset->kode_aset }}">
                                                    <span class="badge bg-primary"
                                                        style="color: white;">{{ $asset->kode_aset }}</span>
                                                </a>
                                            </td>
                                            <td>{{ $asset->nama_aset }}</td>
                                            <td>{{ $asset->category->nama_kategori ?? '-' }}</td>
                                            <td>{{ $asset->location->nama_lokasi ?? '-' }}</td>
                                            <td>
                                                @if($asset->kondisi == 'baik')
                                                    <span class="badge bg-success" style="color: white;">Baik</span>
                                                @elseif($asset->kondisi == 'maintenance')
                                                    <span class="badge bg-warning" style="color: white;">Maintenance</span>
                                                @elseif($asset->kondisi == 'rusak')
                                                    <span class="badge bg-danger" style="color: white;">Rusak</span>
                                                @else
                                                    <span class="badge bg-secondary"
                                                        style="color: white;">{{ $asset->kondisi }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $asset->jumlah }}</td>
                                            <td>
                                                <a href="{{ route('asset.show', $asset->id) }}" class="btn btn-primary btn-sm"
                                                    title="View Detail Asset">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('asset.edit', $asset->id) }}" class="btn btn-warning btn-sm"
                                                    title="Edit Asset">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('asset.destroy', $asset->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                                        class="btn btn-danger btn-sm" title="Delete Asset">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-3">
                                                <i class="fas fa-inbox"></i> Data asset belum tersedia
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