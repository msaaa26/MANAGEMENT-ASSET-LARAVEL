@extends ('layouts.stisla')
@section('title', 'Laporan Mutasi Aset')
@section('content')


    <section class="section">
        <div class="section-header">
            <h1>Laporan Mutasi Aset</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="card">
            <div class="card-header bg-white text-white d-flex justify-content-between align-items-center">
                <h4>Informasi Mutasi Asset</h4>
                <div class="gap-1">
                    <a href="{{ route('laporan.mutasi.pdf', request()->all()) }}" class="btn btn-danger rounded" onclick="confirmNotif(event)">
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
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="table-1">
                        <thead>
                            <tr>
                                <th>Kode Asset</th>
                                <th>Nama Asset</th>
                                <th>Dari</th>
                                <th>Ke</th>
                                <th>Tanggal</th>
                                <th>Petugas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mutasi as $index => $mutasi)
                                <tr>
                                    <td>{{ $mutasi->aset->kode_aset }}</td>
                                    <td>{{ $mutasi->aset->nama_aset ?? '-' }}</td>
                                    <td><span
                                            class="badge bg-primary text-white">{{ $mutasi->lokasiAsal->nama_lokasi ?? '-' }}</span>
                                    </td>
                                    <td><span
                                            class="badge bg-success text-white">{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}</span>
                                    </td>
                                    <td>{{ $mutasi->tanggal_mutasi ?? '-' }}</td>
                                    <td>{{ $mutasi->user->name ?? '-' }}</td>
                                    <td>{{ $mutasi->keterangan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <i class="fas fa-info-circle"></i>
                                        Tidak ada data mutasi aset.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection