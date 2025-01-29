<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/seodashlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ route('admin.home') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/logo-light.svg') }}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Master Data</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.rak.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="game-icons:bookshelf" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Rak</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.ddc.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:book-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">DDC</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.format.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Format</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.penerbit.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:buildings-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Penerbit</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.pengarang.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:users-group-rounded-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Pengarang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.pustaka.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:library-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Pustaka</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Pengaturan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.jenis-anggota.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Jenis Anggota</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.perpustakaan.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:library-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Profil Perpustakaan</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Transaksi</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.transaksi.index') }}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:book-bookmark-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Peminjaman Buku</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">

      @include('partialsAdmin.navbar')

      @yield('content')

  </div>
  @include('partialsAdmin.footer')
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>