<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('/images/logoHeader.png') }}" alt="logoHeader" height="50" class="me-2">
        </a>

        <!-- Hamburger button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Tengah + Tombol Login -->
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarNav">
            <!-- Menu Tengah -->
            <ul class="navbar-nav mx-auto gap-lg-4 text-center">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') ? 'fw-bold' : '' }}"
                       style="color: #081F5C;" href="{{ url('/home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentangkami') ? 'fw-bold' : '' }}"
                       style="color: #081F5C;" href="{{ url('/tentangkami') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita') ? 'fw-bold' : '' }}"
                       style="color: #081F5C;" href="{{ url('/berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('synapoint') ? 'fw-bold' : '' }}"
                       style="color: #081F5C;" href="{{ url('/synapoint') }}">Synapoint</a>
                </li>
            </ul>

        <!-- Tombol Login / Info Pengguna -->
        <div class="text-center mt-3 mt-lg-0">
                @auth
                    {{-- Blok ini akan dijalankan JIKA PENGGUNA SUDAH LOGIN --}}
                    <div class="d-flex align-items-center gap-2">
                        <span class="fw-bold" style="color: #F2F0DE;">
                            {{ Auth::user()->nama }} {{-- Menggunakan kolom 'nama' yang benar --}}
                        </span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm rounded-pill" style="background-color: #D94141; color: #F2F0DE;">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    {{-- Blok ini akan dijalankan JIKA PENGGUNA BELUM LOGIN --}}
                    <a href="{{ url('/login') }}" class="btn px-4 rounded-pill" style="color: #F2F0DE; background-color:#081F5C;">
                        Login/Sign In
                    </a>
                @endauth {{-- Ini adalah penutup yang paling penting --}}
            </div>
        </div>
    </div>
</nav>
