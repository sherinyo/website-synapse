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
                       style="color: #081F5C;" href="{{ url('/') }}">Beranda</a>
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
                @if(Auth::check())
                    <div class="d-flex align-items-center gap-2">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #081F5C;">
                                <i class="bi bi-person-circle fs-4 me-2"></i>
                                <span class="fw-bold">{{ Auth::user()->name ?? 'Pengguna' }}</span>
                                <span class="ms-2">({{ Auth::user()->points ?? 0 }} pts)</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="{{ url('/login') }}" class="btn px-4 rounded-pill"
                       style="background-color: #081F5C; color:#F2F0DE;">
                        Login/Sign In
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
