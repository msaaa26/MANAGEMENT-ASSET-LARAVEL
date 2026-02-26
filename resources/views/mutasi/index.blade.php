@extends ('layouts.stisla')
@section('title', 'Daftar Mutasi Aset')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Daftar Mutasi Asset</h1>
        </div>
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
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Mutasi Aset</h4>
                    <div class="card-header-action">
                        <a href="{{ route('mutasi.create') }}" class="btn btn-primary">Catat Mutasi Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Lokasi Asal</th>
                                    <th>Lokasi Tujuan</th>
                                    <th>Tanggal Mutasi</th>
                                    <th>Petugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mutasiAsets as $index => $mutasi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $mutasi->aset->kode_aset ?? '-' }}</td>
                                        <td>{{ $mutasi->aset->nama_aset ?? '-' }}</td>
                                        <td><span class="badge bg-primary"
                                                style="color: white;">{{ $mutasi->lokasiAsal->nama_lokasi ?? '-' }}</span></td>
                                        <td><span class="badge bg-success"
                                                style="color: white;">{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}</span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($mutasi->tanggal_mutasi)->format('d M Y') }}</td>
                                        <td>{{ $mutasi->user->name ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('mutasi.show', $mutasi->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('mutasi.edit', $mutasi) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('mutasi.destroy', $mutasi) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus mutasi ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($mutasiAsets->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">
                                            <div class="py-4">
                                                <i class="fas fa-inbox"></i>
                                                <span>Tidak ada data mutasi aset.</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted font-italic mt-2">Note : Urutan data list dalam table di sort berdasarkan petugas
                        yang input</p>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection