@extends ('layouts.stisla')
@section('title', 'Edit Mutasi Asset')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Edit Mutasi Asset</h1>
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
                        <form action="{{ route('mutasi.update', $mutasiAset) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="aset_id" class="form-label">Pilih Asset</label>
                                <select name="aset_id" id="aset_id" class="form-control" required>
                                    <option value="">-- Pilih Asset --</option>
                                    @foreach($asets as $aset)
                                        <option value="{{ $aset->id }}" {{ $mutasiAset->aset_id == $aset->id ? 'selected' : '' }}>{{ $aset->nama_aset }} ({{ $aset->kode_aset }})</option>
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
                                                <option value="{{ $location->id }}" {{ $mutasiAset->lokasi_asal_id == $location->id ? 'selected' : '' }}>
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
                                                <option value="{{ $location->id }}" {{ $mutasiAset->lokasi_tujuan_id == $location->id ? 'selected' : '' }}>
                                                    {{ $location->nama_lokasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="tanggal_mutasi" class="form-label">Tanggal Mutasi</label>
                                        <input type="date" name="tanggal_mutasi" id="tanggal_mutasi" class="form-control" value="{{ $mutasiAset->tanggal_mutasi }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="4">{{ $mutasiAset->keterangan }}</textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Perubahan
                                </button>
                                <a href="{{ route('mutasi.index') }}" class="btn btn-secondary ml-2">
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
