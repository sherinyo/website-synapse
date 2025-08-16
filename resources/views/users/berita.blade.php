@extends('base.base')

@section('content')

<main class="container my-5">
    {{-- Hero Section - Menampilkan event/berita terbaru --}}
    {{-- VERSI BARU: HERO SECTION DENGAN CAROUSEL --}}
    @if($heroNews->isNotEmpty())
    <div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($heroNews as $key => $item)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner rounded-3">
            @foreach($heroNews as $key => $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="hero-slide d-flex align-items-center justify-content-center text-center text-white" 
                        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/news/' . $item->gambar) }}'); min-height: 400px; background-size: cover; background-position: center;">
                        
                        <div>
                            <span class="badge bg-white text-dark shadow-sm mb-2">{{ $item->role }}</span>
                            <h1 class="display-4 fw-bold">{{ $item->nama }}</h1>
                            @if($item->mulai)
                                <p class="lead">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    Dimulai pada {{ \Carbon\Carbon::parse($item->mulai)->translatedFormat('d F Y') }}
                                </p>
                            @endif
                            <a href="{{ route('news.public.show', $item->id) }}" class="btn btn-lg mt-2" style="background-color: white; color:#081F5C">Lihat Detail</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @endif

    {{-- Tabs untuk Filter --}}
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link {{ request('tipe', 'Event') == 'Event' ? 'active' : 'text-muted' }}" href="{{ route('news.public.index', ['tipe' => 'Event']) }}">Event</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request('tipe') == 'News' ? 'active' : 'text-muted' }}" href="{{ route('news.public.index', ['tipe' => 'News']) }}">News</a>
        </li>
    </ul>

    {{-- Daftar Berita/Event --}}
    <div class="row rounded-3">
        @forelse($listNews as $item)
        <div class="col-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-2 d-none d-md-block" style="background-image: url('{{ asset('images/news/' . $item->gambar) }}'); background-size: cover; background-position: center;">
                        {{-- Bagian ini untuk gambar di sisi kiri --}}
                    </div>
                    <div class="col-md-10">
                        <div class="card-body p-4">
                            {{-- Hanya tampilkan baris tanggal jika data 'mulai' ada --}}
                            @if($item->mulai)
                            <div class="d-flex align-items-center text-muted small mb-2">
                                <i class="bi bi-calendar-event-fill px-2" style="color: #081F5C"></i>
                                <span>{{ \Carbon\Carbon::parse($item->mulai)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($item->selesai)->translatedFormat('d M Y') }}</span>
                            </div>
                            @endif

                            <h3 class="card-title h4 fw-bold">{{ $item->nama }}</h3>

                            {{-- Hanya tampilkan baris lokasi jika data 'lokasi' ada --}}
                            @if($item->lokasi)
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-geo-alt-fill px-2"  style="color: #081F5C"></i>
                                <span>{{ $item->lokasi }}</span>
                            </div>
                            @endif
                            
                            <a href="{{ route('news.public.show', $item->id) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center text-muted">Belum ada data untuk kategori ini.</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination Links --}}
    <nav class="d-flex justify-content-center">
        {{-- Menampilkan link pagination dan menjaga filter 'tipe' saat pindah halaman --}}
        {{ $listNews->withQueryString()->links() }}
    </nav>
</main>
@endsection