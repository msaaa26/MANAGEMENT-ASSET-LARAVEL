<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">Management Asset</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('home') }}">MA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="nav-item dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
          <i class="fas fa-fire"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="menu-header">Menu Petugas</li>
      <li class="nav-item dropdown {{ request()->routeIs('asset.*') ? 'active' : '' }}">
        <a href="{{ route('asset.index') }}" class="nav-link">
          <i class="fas fa-boxes"></i>
          <span>Data Asset</span>
        </a>
      </li>
      <li class="nav-item dropdown {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
        <a class="nav-link has-dropdown" href="{{ route('laporan.aset') }}"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('laporan.aset') }}">Laporan Aset</a></li>
          <li><a class="nav-link" href="{{ route('laporan.mutasi') }}">Laporan Riwayat Mutasi</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link text-muted" tabindex="-1" aria-disabled="true">
          <i class="fas fa-calendar"></i>
          <span>Maintenance Scheduling</span>
        </a>
      </li>
      <li class="menu-header">Transaksi</li>
      <li class="nav-item dropdown {{ request()->routeIs('mutasi.*') ? 'active' : '' }}">
        <a href="{{ route('mutasi.index')}}" class="nav-link"><i class="fas fa-exchange-alt"></i><span>Mutasi
            Asset</span></a>
      </li>
      <li class="menu-header">Account</li>
      <li class="nav-item dropdown {{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <a href="{{ Route('profile.profile')}}" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a>
      </li>
      <li class="menu-header">Menu Admin</li>
      <li class="nav-item dropdown {{ request()->routeIs('category.*') ? 'active' : '' }}">
        <a href="{{ route('category.index')}}" class="nav-link"><i class="fas fa-list"></i><span>Management
            Category</span></a>
      </li>
      <li class="nav-item dropdown {{ request()->routeIs('location.*') ? 'active' : '' }}">
        <a href="{{ route('location.index')}}" class="nav-link"><i class="fas fa-map-marker-alt"></i><span>Management
            Location</span></a>
      </li>
    </ul>
  </aside>
</div>