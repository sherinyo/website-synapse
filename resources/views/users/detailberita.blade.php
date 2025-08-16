@extends('base.base')

@section('title', $newsItem->nama) {{-- Judul halaman dinamis --}}

@section('content')

<main class="container my-5">
    <div class="mb-4">
        <a href="{{ route('news.public.index') }}" class="text-decoration-none text-dark fw-bold">
            &larr; Kembali ke Daftar Berita
        </a>
    </div>

    {{-- Hero section dengan gambar berita --}}
    <div class="p-5 rounded-3 mb-5 text-center bg-dark text-white" style="background-image: url('{{ asset('images/news/' . $newsItem->gambar) }}'); background-size: cover; background-position: center; min-height: 300px;">
        <div class="bg-dark bg-opacity-50 p-4 rounded">
            <h1 class="display-4 fw-bold">{{ $newsItem->nama }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="fw-bold mb-4">Deskripsi</h2>
            <div class="fs-5">
                {!! nl2br(e($newsItem->deskripsi)) !!}
            </div>
        </div>
    </div>

    {{-- Metadata: Tanggal & Lokasi --}}
    <div class="row mt-5">
        {{-- Hanya tampilkan blok tanggal jika data 'mulai' ada --}}
        @if($newsItem->mulai)
        <div class="col-md-6 mb-3">
            <div class="p-3 rounded-3 d-flex align-items-center" style="background-color: #D0E3FF">
                <i class="bi bi-calendar-event-fill me-3 fs-4" style="color: #081F5C"></i>
                <span class="fw-bold">{{ \Carbon\Carbon::parse($newsItem->mulai)->translatedFormat('d M Y') }} - {{ \Carbon\Carbon::parse($newsItem->selesai)->translatedFormat('d M Y') }}</span>
            </div>
        </div>
        @endif

        {{-- Hanya tampilkan blok lokasi jika data 'lokasi' ada --}}
        @if($newsItem->lokasi)
        <div class="col-md-6 mb-3">
            <div class="p-3 rounded-3 d-flex align-items-center" style="background-color: #D0E3FF">
                <i class="bi bi-geo-alt-fill me-3 fs-4"  style="color: #081F5C"></i>
                <span class="fw-bold">{{ $newsItem->lokasi }}</span>
            </div>
        </div>
        @endif
    </div>
</main>

@endsection