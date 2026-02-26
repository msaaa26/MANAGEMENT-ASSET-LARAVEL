@extends ('layouts.stisla')
@section('title', 'Create Mutasi Asset')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Catat Mutasi Asset</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body mb-3">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!, </strong>
                                <span class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </span>
                            </div>
                        @endif
                        <form action="{{ route('mutasi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="aset_id" class="form-label">Pilih Asset</label>
                                <select name="aset_id" id="aset_id" class="form-control" required>
                                    <option value="">-- Pilih Asset --</option>
                                    @foreach($asets as $aset)
                                        <option value="{{ $aset->id }}">{{ $aset->nama_aset }} ({{ $aset->kode_aset }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lokasi_asal_id" class="form-label">Lokasi Asal</label>
                                        <select name="lokasi_asal_id" id="lokasi_asal_id" class="form-control" required>
                                            <option value="">-- Pilih Lokasi Asal --</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">
                                                    {{ $location->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lokasi_tujuan_id" class="form-label">Lokasi Tujuan</label>
                                        <select name="lokasi_tujuan_id" id="lokasi_tujuan_id" class="form-control" required>
                                            <option value="">-- Pilih Lokasi Tujuan --</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">
                                                    {{ $location->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="aset_id" class="form-label">Tanggal Mutasi</label>
                                <input type="date" name="tanggal_mutasi" id="tanggal_mutasi" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan">Keterangan (opsional):</label><br>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                                    placeholder="Masukkan keterangan tambahan..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Simpan Mutasi
                            </button>
                            <a href="{{ route('mutasi.index') }}" class="btn btn-primary ml-1">
                                <i class="fas fa-arrow-left"></i> Batal
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection