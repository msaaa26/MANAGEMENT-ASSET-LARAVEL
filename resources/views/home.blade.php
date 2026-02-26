@extends('layouts.stisla')

@section('title', 'Dashboard')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="transition: transform .3s; cursor: pointer;"
          onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="card-icon bg-primary">
            <i class="fa-solid fa-circle-check" style="color:white; font-size: 23px;"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Baik</h4>
            </div>
            <div class="card-body">
              {{ $baik }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="transition: transform .3s; cursor: pointer;"
          onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="card-icon bg-danger">
            <i class="fa-solid fa-circle-xmark" style="color:white; font-size: 23px;"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Rusak</h4>
            </div>
            <div class="card-body">
              {{ $rusak }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="transition: transform .3s; cursor: pointer;"
          onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="card-icon bg-warning">
            <i class="fa-solid fa-screwdriver-wrench" style="color:white; font-size: 23px;"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Maintenance</h4>
            </div>
            <div class="card-body">
              {{ $maintenance }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1" style="transition: transform .3s; cursor: pointer;"
          onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
          <div class="card-icon bg-success">
            <i class="fa-solid fa-circle" style="color:white; font-size: 23px;"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Asset Baik</h4>
            </div>
            <div class="card-body">
              {{ number_format($persenBaik, 1) }}%
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Table Assset -->
    <div class="col-lg-20 col-md-12 col-12 col-sm-12 col-xs-12 col-xxl-12 col-xl-12 mb-4 card">
      <div class="card">
        <div class="card-header">
          <h4>{{__('Aset Terbaru')}}</h4>
          <div class="card-header-action">
            <a href="{{ route('asset.index') }}" class="btn btn-primary">{{__('Lihat Semua')}}</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover">
              <thead>
                <tr>
                  <th>{{__('No')}}</th>
                  <th>{{__('Kode Asset')}}</th>
                  <th>{{__('Nama Asset')}}</th>
                  <th>{{__('Kategori')}}</th>
                  <th>{{__('Lokasi')}}</th>
                  <th>{{__('Kondisi')}}</th>
                  <th>{{__('Tanggal Di Buat')}}</th>
                  <th>{{__('Aksi')}}</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($asets as $key => $asset)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><span class="badge bg-primary" style="color: white;">{{ $asset->kode_aset }}</span></td>
                    <td>{{ $asset->nama_aset }}</td>
                    <td>
                      {{ $asset->category->nama_kategori ?? '-' }}
                    </td>
                    <td>
                      {{ $asset->location->nama_lokasi ?? '-' }}
                    </td>
                    <td>
                      @if($asset->kondisi == 'baik')
                        <span class="badge bg-success" style="color: white;">Baik</span>
                      @elseif($asset->kondisi == 'maintenance')
                        <span class="badge bg-warning" style="color: white;">Maintenance</span>
                      @elseif($asset->kondisi == 'rusak')
                        <span class="badge bg-danger" style="color: white;">Rusak</span>
                      @else
                        <span class="badge bg-secondary" style="color: white;">Unknown</span>
                      @endif
                    </td>
                    <td>
                      {{ $asset->created_at}}
                    </td>
                    <td>
                      <a href="{{ route('asset.show', $asset->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center text-muted py-3">
                      <i class="fas fa-inbox"></i> Data aset belum tersedia
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
  </section>
@endsection