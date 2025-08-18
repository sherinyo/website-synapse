@extends('base.base')

@section('title', 'Home')

@section('content')

<style>
  .banner {
    background-color: #D9D9D9;
    height: 400px;
    margin-bottom: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .tentang-kami {
    margin-bottom: 100px;
  }

  .tentang-kami img {
    max-height: 300px;
    object-fit: contain;
  }

  .penjelasan {
    color: #344EAD;
  }

  .penjelasan h1 {
    font-weight: 800;
  }

  .penjelasan h2,
  .penjelasan h5 {
    font-weight: normal;
    font-size: 20px;
  }

  .penjelasan button {
    margin: 10px 0;
    font-family: poppins;
    font-weight: 300;
    font-size: 15px;
    color: white;
    background-color: #344EAD;
    border-radius: 8px;
    border: none;
    padding: 8px 15px;
    transition: background-color 0.3s ease;
  }

  .penjelasan button:hover {
    background-color: #2B3D95;
  }

  .section-title {
    text-align: center;
    color: #344EAD;
    font-weight: 600;
    margin-bottom: 10px;
  }

  .section-subtitle {
    text-align: center;
    margin-bottom: 50px;
  }

  .info-card {
    background-color: white;
    border-radius: 25px;
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.1);
    padding: 20px 60px;
    text-align: center;
    margin-bottom: 30px;
    transition: all 0.3s ease; /* agar transisi hover halus */
    }

    .info-card:hover {
    box-shadow: 0 12px 50px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px); /* sedikit naik ke atas */
    }

  .info-card img {
    height: 60px;
    margin: 30px auto 60px;
    display: block;
  }

  .info-card h4 {
    font-family: poppins;
    font-weight: bold;
    color: #1C4CE1;
    font-size: 20px;
    text-align: left;
  }

  .info-card p {
    font-family: poppins;
    font-size: 17px;
    text-align: left;
  }

  .heading {
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
    color: #334EAC;
  }

  .berita-card {
    background-color: white;
    border-radius: 25px;
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.1);
    padding: 25px;
    box-sizing: border-box;
    margin-bottom: 40px;
  }

  .berita-card .foto {
    width: 100%;
    height: 180px;
    background-color: #ccc;
    border-radius: 12px;
    margin-bottom: 15px;
  }

  .berita-card h6 {
    font-family: inter;
    font-weight: 800;
    font-size: 14px;
    color: #344EAD;
  }

  .berita-card h5 {
    font-family: poppins;
    font-size: 18px;
    font-weight: 700;
    color: #1C4CE1;
    margin-top: 10px;
  }

  .berita-card button {
    margin-top: 10px;
    background-color: #344EAD;
    color: white;
    border: none;
    padding: 6px 16px;
    border-radius: 8px;
    font-family: poppins;
    font-size: 14px;
  }

  @media (max-width: 768px) {
    .tentang-kami img {
      margin-bottom: 20px;
    }

    .podcast-video {
      height: 250px;
    }
  }
</style>

<!-- BANNER -->
<div class="banner"></div>

<!-- TENTANG KAMI -->
<div class="container tentang-kami">
  <div class="row align-items-center">
    <div class="col-md-4 text-center">
      <img src="images/logoHeader.png" alt="logo" class="img-fluid">
    </div>
    <div class="col-md-8 penjelasan">
      <h2>Tentang Kami</h2>
      <h1>Kabinet Synapse</h1>
      <h5>Mendorong setiap mahasiswa/i untuk menjadi versi terbaik dari diri mereka masing-masing melalui program-program yang kami buat.</h5>
      <button>Selengkapnya</button>
    </div>
  </div>
</div>

<!-- SECTION: INFO -->
<!-- SECTION: INFO -->
<div class="container">
  <h1 class="section-title">Ingin Tahu Lebih Lanjut?</h1>
  <h5 class="section-subtitle">Yuk kita lihat informasi apa saja yang tersedia</h5>
  <div class="row">
    <div class="col-md-4">
      <a href="kabinet.html" class="text-decoration-none text-dark">
        <div class="info-card">
          <img src="images/badge.png" alt="badge">
          <h4>Kabinet Synapse</h4>
          <p>Seputar informasi visi, misi, dan detail department.</p>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="berita.html" class="text-decoration-none text-dark">
        <div class="info-card">
          <img src="images/badge.png" alt="badge">
          <h4>Berita</h4>
          <p>Berisi kegiatan yang dilaksanakan SU dan informasi lainnya.</p>
        </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="synapoint.html" class="text-decoration-none text-dark">
        <div class="info-card">
          <img src="images/badge.png" alt="badge">
          <h4>Synapoint</h4>
          <p>Poin Synapse dapat ditukarkan dengan barang menarik dari SU.</p>
        </div>
      </a>
    </div>
  </div>
</div>


<!-- SYNAPOINT -->


<!-- SECTION: BERITA -->
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color: #1C4CE1;">BERITA</h1>
    </div>
    
    <div class="row">
        @forelse ($latestNews as $newsItem)
            <div class="col-md-6 col-lg-4 mb-4">
                {{-- Menggunakan komponen Card Bootstrap --}}
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <a href="{{ route('news.public.show', $newsItem->id) }}">
                        <img src="{{ $newsItem->gambar ? asset('images/news/' . $newsItem->gambar) : 'https://via.placeholder.com/400x250.png?text=Synapse' }}" 
                             class="card-img-top" 
                             alt="{{ $newsItem->nama }}" 
                             style="height: 200px; object-fit: cover; border-top-left-radius: inherit; border-top-right-radius: inherit;">
                    </a>
                    
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-subtitle mb-2 text-muted text-uppercase">{{ $newsItem->role }}</h6>
                        <h5 class="card-title fw-bold flex-grow-1">
                            <a href="{{ route('news.public.show', $newsItem->id) }}" class="text-decoration-none text-dark">
                                {{ Str::limit($newsItem->nama, 55) }}
                            </a>
                        </h5>
                        <a href="{{ route('news.public.show', $newsItem->id) }}" class="btn btn-primary mt-3" style="background-color: #1C4CE1; border-color: #1C4CE1;">Selengkapnya</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">Belum ada berita untuk ditampilkan.</p>
            </div>
        @endforelse
    </div>
</div>

{{-- PODCAST --}}
<div class="container mt-5 text-center">
    <h1 class="heading">PODCAST</h1>
    @if(isset($latestPodcast) && $latestPodcast)
        <iframe width="560" height="315"
                src="{{ $latestPodcast->embed_link }}"
                title="Podcast"
                frameborder="0"
                allowfullscreen>
        </iframe>
        <h3 style="color:#1C4CE1; margin-bottom:100px; margin-top: 30px;">{{ $latestPodcast->name }}</h3>
    @else
        <p>Tidak ada podcast yang tersedia saat ini.</p>
    @endif
</div>
@endsection
