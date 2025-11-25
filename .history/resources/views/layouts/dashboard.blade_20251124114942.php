<!-- stylelint-disable -->
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Template config -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
      {{-- layout wrapper --}}
    <div class="layout-wrapper layout-content-navbar">
        {{-- Menu --}}
        <!-- Inline sidebar placeholder (replaces missing includes/sidebar view) -->
        <aside class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
              <span class="app-brand-logo">📚</span>
              <span class="app-brand-text">Perpustakaan</span>
            </a>
          </div>

          <ul class="menu-inner py-1">
          {{-- navbar --}}
          <!-- Inline navbar placeholder (replaces missing includes/navbar view) -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">Perpustakaan</a>
              </div>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
          {{-- footer --}}
          <!-- Inline footer placeholder (replaces missing includes/footer view) -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container text-center py-2">
                <span class="text-muted">© {{ date('Y') }} Perpustakaan</span>
              </div>
            </div>
          </footer>
          {{-- / footer --}}
            </div>
          </nav>
          {{-- / navbar --}}
                <div>Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route('books.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div>Buku</div>
              </a>
            </li>
          </ul>
        </aside>
        {{-- / end menu --}}
        {{-- / end menu --}}



        {{-- / menu --}}
       

        {{-- layout container --}}
         <div class="layout-page">
          {{-- navbar --}}
          @include('includes.navbar')
          {{-- / navbar --}}

          {{-- content wrapper --}}
         <div class="content-wrapper">
          @yield('content')
          {{-- /content --}}

          {{-- footer --}}
          @include('includes.footer')
          {{-- / footer --}}

          <div class="content-backdrop fade">
          </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="buy-now">

      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
