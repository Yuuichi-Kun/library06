<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">InterLibrary</h1>


      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="{{ route('anggota.register') }}">Daftar Anggota</a></li>
          
          @auth
              @if(auth()->user()->anggota)
                  <li><a href="{{ route('user.borrowing.history') }}">Riwayat Peminjaman</a></li>
              @endif
              <li class="dropdown">
                  <a href="#" class="d-flex align-items-center">
                      <span class="me-2">{{ Auth::user()->name }}</span>
                      <img class="rounded-circle" 
                          src="{{ Auth::user()->avatar ? 'avatars/'.Auth::user()->avatar : asset('/img/default_profile.png') }}"
                          style="width: 40px; height: 40px; object-fit: cover;">
                      <i class="bi bi-chevron-down toggle-dropdown"></i>
                  </a>
                  <ul>
                      <li>
                          <a href="{{ route('profileUser.edit') }}">
                              <i class="fas fa-user fa-sm fa-fw me-2"></i>
                              Profile
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('logout') }}"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw me-2"></i>
                              {{ __('Logout') }}
                          </a>
                      </li>
                  </ul>
              </li>
          @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      @guest
          <a class="btn-getstarted" href="#about">Get Started</a>
      @endguest

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </div>
  </header>