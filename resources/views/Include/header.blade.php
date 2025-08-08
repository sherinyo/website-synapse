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
            <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold" style="color: #081F5C;">
                        {{ Auth::user()->first_name }} ({{ Auth::user()->points }} pts)
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm rounded-pill" style="background-color: #081F5C; color: #F2F0DE;">
                            Logout
                        </button>
                    </form>
                </div>

            {{-- <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </div> --}}
            @else
                <a href="{{ url('/login') }}" class="btn px-4 rounded-pill"
                style="background-color: #081F5C; color:#F2F0DE;">
                    Login/Sign In
                </a>
        @endauth
        </div>
        </div>
    </div>
</nav>
