@extends ('layouts.stisla')
@section('title', 'Laporan Asset')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Laporan Asset</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
                    <h4>Informasi Data Asset</h4>
                    <div class="gap-1">
                        <a href="{{ route('laporan.aset.pdf', request()->all()) }}" class="btn btn-danger rounded"
                            onclick="confirmNotif(event)">
                            <i class="fas fa-file-pdf"></i>
                            Export PDF
                        </a>
                        <script>
                            function confirmLog(event) {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Maaf,',
                                    text: "Fitur ini sedang dalam maintenance. Harap tunggu pembaruan selanjutnya.",
                                })
                            }
                        </script>
                        <button class="btn btn-success rounded ml-1" onclick="confirmLog(event)">
                            <i class="fas fa-file-excel"></i>
                            Export Excel
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <script>
                            function confirmNotif(event) {
                                event.preventDefault();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops ...',
                                    text: "{{ session('error') }}",
                                });
                            }
                        </script>
                    @endif
                    <form action="{{ route('laporan.aset') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <select name="kategori_id" class="form-control">
                                        <option value="">Semua Kategori</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ request('kategori_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Periode (Tanggal)</label>
                                <div class="d-flex gap-2">
                                    <input type="date" name="periode" class="form-control" value="{{ request('periode') }}">
                                    <button type="submit" class="btn btn-primary rounded text-nowrap ml-3">
                                        <i class="fas fa-filter"></i> Tampilkan
                                    </button>
                                    <a href="{{ route('laporan.aset') }}"
                                        class="btn btn-primary rounded ml-1 d-flex align-items-center">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($aset as $index => $asset)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $asset->kode_aset }}</td>
                                        <td>{{ $asset->nama_aset }}</td>
                                        <td><span
                                                class="badge bg-primary text-white">{{ $asset->category->nama_kategori ?? '-' }}</span>
                                        </td>
                                        <td>{{ $asset->location->nama_lokasi ?? '-' }}</td>
                                        <td>{{ $asset->created_at->format('d-M-Y') ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            <i class="fas fa-info-circle"></i>
                                            Data tidak ditemukan untuk filter ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection