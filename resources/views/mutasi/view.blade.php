@extends('layouts.stisla')
@section('title', 'Detail Mutasi Aset')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Mutasi Aset</h1>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white text-primary d-flex justify-content-between align-items-center">
                        <h4>Informasi Mutasi #{{ $mutasiAset->id }}</h4>
                        <div class="card-header-action">
                            <span>Created on {{ $mutasiAset->created_at }} | Update on {{ $mutasiAset->updated_at }}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Kode Asset</label>
                                <div><span class="badge bg-info" style="color:white; font-size: 1rem;"></span>{{ $mutasiAset->aset->kode_aset }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Nama Asset</label>
                                <div>{{ $mutasiAset->aset->nama_aset ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Lokasi Asal</label>
                                <div><span class="badge bg-primary text-white">{{ $mutasiAset->lokasiAsal->nama_lokasi ?? '-' }}</span></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Lokasi Tujuan</label>
                                <div><span class="badge bg-success text-white">{{ $mutasiAset->lokasiTujuan->nama_lokasi ?? '-' }}</span></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Tanggal Mutasi</label>
                                <div>{{ \Carbon\Carbon::parse($mutasiAset->tanggal_mutasi)->format('d M Y') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Petugas</label>
                                <div>{{ $mutasiAset->user->name ?? '-' }}</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Keterangan</label>
                                <div>{{ $mutasiAset->keterangan ?? '-' }}</div>
                            </div>
                        </div>
                        <a href="{{ route('mutasi.index') }}" class="btn btn-primary mt-2 mb-3">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('mutasi.edit', $mutasiAset) }}" class="btn btn-warning ml-1 mt-2 mb-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('mutasi.destroy', $mutasiAset) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-1 mt-2 mb-3"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus mutasi ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection