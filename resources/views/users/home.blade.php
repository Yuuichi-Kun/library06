@extends('layouts.user')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">

<img src="{{ asset('assets/img/hero-bg-abstract.jpg') }}" alt="" data-aos="fade-in" class="">

<div class="container">
  <div class="row justify-content-center" data-aos="zoom-out">
    <div class="col-xl-7 col-lg-9 text-center">
      <h1>Perpustakaan Digital Modern</h1>
      <p>Jelajahi ribuan koleksi buku digital dan fisik untuk menambah wawasan Anda</p>
    </div>
  </div>
  <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
    <a href="#about" class="btn-get-started">Mulai Membaca</a>
  </div>

  <div class="row gy-4 mt-5">
    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="100">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-book"></i></div>
        <h4 class="title"><a href="">Koleksi Digital</a></h4>
        <p class="description">Akses ribuan e-book dan jurnal digital kapanpun dan dimanapun</p>
      </div>
    </div><!--End Icon Box -->

    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="200">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-search"></i></div>
        <h4 class="title"><a href="">Pencarian Mudah</a></h4>
        <p class="description">Temukan buku yang Anda cari dengan sistem pencarian yang canggih</p>
      </div>
    </div><!--End Icon Box -->

    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="300">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-calendar-check"></i></div>
        <h4 class="title"><a href="">Peminjaman Online</a></h4>
        <p class="description">Pinjam dan perpanjang buku secara online dengan mudah</p>
      </div>
    </div><!--End Icon Box -->

    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="400">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-people"></i></div>
        <h4 class="title"><a href="">Komunitas Pembaca</a></h4>
        <p class="description">Bergabung dengan komunitas pembaca dan diskusikan buku favorit</p>
      </div>
    </div><!--End Icon Box -->

  </div>
</div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Tentang Kami</h2>
  <p>Perpustakaan modern yang menghadirkan pengalaman membaca tanpa batas</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
      <p>
        Perpustakaan kami hadir dengan konsep modern yang menggabungkan koleksi fisik dan digital untuk memberikan akses pengetahuan yang lebih luas.
      </p>
      <ul>
        <li><i class="bi bi-check2-circle"></i> <span>Koleksi lengkap dengan ribuan judul buku fisik dan digital</span></li>
        <li><i class="bi bi-check2-circle"></i> <span>Sistem peminjaman online yang mudah dan efisien</span></li>
        <li><i class="bi bi-check2-circle"></i> <span>Fasilitas modern dan ruang baca yang nyaman</span></li>
      </ul>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
      <p>Kami berkomitmen untuk terus mengembangkan layanan perpustakaan yang berkualitas dan relevan dengan kebutuhan pembaca modern. Dengan menggabungkan teknologi dan pelayanan yang prima, kami hadir sebagai pusat pembelajaran yang dapat diakses oleh semua kalangan.</p>
      <a href="#" class="read-more"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
    </div>

  </div>

</div>

</section><!-- /About Section -->

<!-- Stats Section -->
<section id="stats" class="stats section light-background">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="50000" data-purecounter-duration="1" class="purecounter"></span>
        <p>Koleksi Buku</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="10000" data-purecounter-duration="1" class="purecounter"></span>
        <p>E-Books</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="1" class="purecounter"></span>
        <p>Anggota Aktif</p>
      </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-3 col-md-6">
      <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
        <p>Jam Layanan/Hari</p>
      </div>
    </div><!-- End Stats Item -->

  </div>

</div>

</section><!-- /Stats Section -->

<!-- Latest Books Section -->
<section id="latest-books" class="about-alt section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Koleksi Terbaru</h2>
    <p>Temukan buku-buku terbaru di perpustakaan kami</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      @forelse($latestBooks as $book)
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
          <div class="card h-100">
            <img src="{{ asset($book->gambar ?? 'assets/img/book-placeholder.jpg') }}" 
                 class="card-img-top" 
                 alt="{{ $book->judul_pustaka }}"
                 style="height: 250px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">{{ Str::limit($book->judul_pustaka, 50) }}</h5>
              <p class="card-text mb-0">
                <small class="text-muted">
                  <i class="bi bi-person"></i> {{ $book->pengarang->nama_pengarang }}
                </small>
              </p>
              <p class="card-text">
                <small class="text-muted">
                  <i class="bi bi-building"></i> {{ $book->penerbit->nama_penerbit }}
                </small>
              </p>
              <a href="{{ route('books.show', $book->id_pustaka) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Belum ada buku yang ditambahkan</p>
        </div>
      @endforelse
    </div>
  </div>

</section><!-- /Latest Books Section -->

<!-- Clients Section -->
<section id="clients" class="clients section light-background">

<div class="container" data-aos="fade-up">

  <div class="row gy-4">

    <div class="col-xl-2 col-md-3 col-6 client-logo">
      <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-2 col-md-3 col-6 client-logo">
      <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-2 col-md-3 col-6 client-logo">
      <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-2 col-md-3 col-6 client-logo">
      <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-2 col-md-3 col-6 client-logo">
      <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

    <div class="col-xl-2 col-md-3 col-6 client-logo">
      <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
    </div><!-- End Client Item -->

  </div>

</div>

</section><!-- /Clients Section -->
@endsection