{{-- resources/views/includes/sidebar.blade.php --}}
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        {{-- Add your logo image here if needed --}}
        {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" /> --}}
      </span>
      <h4>PAUL PATTON</h4>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    {{-- Dashboard --}}
    <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    {{-- Pengarang --}}
    <li class="menu-item {{ request()->is('pengarang*') ? 'active' : '' }}">
      <a href="{{ route('pengarang.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user-voice"></i>
        <div data-i18n="Pengarang">Pengarang</div>
      </a>
    </li>

    {{-- Kategori --}}
    <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">
      <a href="{{ route('kategori.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-category"></i>
        <div data-i18n="Kategori">Kategori</div>
      </a>
    </li>

    {{-- Buku --}}
    <li class="menu-item {{ request()->is('buku*') ? 'active' : '' }}">
      <a href="{{ route('buku.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book"></i>
        <div data-i18n="Buku">Buku</div>
      </a>
    </li>

    {{-- Peminjaman --}}
    <li class="menu-item {{ request()->is('peminjaman*') ? 'active' : '' }}">
      <a href="{{ route('peminjaman.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
        <div data-i18n="Peminjaman">Peminjaman</div>
      </a>
    </li>

    {{-- Add more menu items as needed, e.g., --}}
    {{-- <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div data-i18n="Users">Users</div>
      </a>
    </li> --}}
  </ul>
</aside>