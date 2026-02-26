@extends('layouts.stisla')
@section('title', 'Detail Asset')

@section('content')


    <section class="section">
        <div class="section-header">
            <h1>Detail Asset</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white text-primary d-flex justify-content-between align-items-center">
                        <h4>Informasi Data Asset #{{ $aset->id }}</h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <!-- <div class="col-md-4">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">ID</label>
                                <div><span class="badge bg-info" style="color:white; font-size:1rem;"></span>{{ $aset->id }}
                                </div>
                            </div> -->
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Kode
                                    Asset</label>
                                <div>
                                    <span class="badge bg-primary" style="color:white;">{{ $aset->kode_aset }}</span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Nama
                                    Asset</label>
                                <div>{{ $aset->nama_aset }}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label"
                                    style="font-weight: bold; color: rgba(43, 43, 43, 1);">Kategori</label>
                                <div>{{ $aset->category->nama_kategori ?? '-' }}</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"
                                    style="font-weight: bold; color: rgba(43, 43, 43, 1);">Lokasi</label>
                                <div>{{ $aset->location->nama_lokasi ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label"
                                    style="font-weight: bold; color: rgba(43, 43, 43, 1);">Jumlah</label>
                                <div>{{ $aset->jumlah }} unit</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"
                                    style="font-weight: bold; color: rgba(43, 43, 43, 1);">Kondisi</label>
                                <div>
                                    @if($aset->kondisi == 'baik')
                                        <span class="badge bg-success" style="color: white;">Baik</span>
                                    @elseif($aset->kondisi == 'maintenance' || $aset->kondisi == 'maintenance')
                                        <span class="badge bg-warning"
                                            style="color: white;">{{ ucfirst($aset->kondisi) }}</span>
                                    @elseif($aset->kondisi == 'rusak')
                                        <span class="badge bg-danger" style="color: white;">Rusak</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $aset->kondisi }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Created
                                    on</label>
                                <div>{{ $aset->created_at }}</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" style="font-weight: bold; color: rgba(43, 43, 43, 1);">Last
                                    update</label>
                                <div>
                                    {{ $aset->updated_at }}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-4 ml-1">
                            <div>
                                <a href="{{ route('asset.index') }}" class="btn btn-primary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <a href="{{ route('asset.edit', $aset->id) }}" class="btn btn-warning ml-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('asset.destroy', $aset->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus data?')"
                                        class="btn btn-danger ml-1" title="Delete Asset">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection