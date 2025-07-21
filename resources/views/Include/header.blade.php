<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center m-0" href="{{ url('/') }}">
            <img src="{{ asset('/images/logoHeader.png') }}" alt="logoHeader" height="50" class="me-2">
        </a>

        <!-- Menu tengah -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link fw-bold" style="color: #081F5C;" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" style="color: #081F5C;" href="{{ url('/tentang') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" style="color: #081F5C;" href="{{ url('/berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" style="color: #081F5C;" href="{{ url('/synapoint') }}">Synapoint</a>
                </li>
            </ul>
        </div>

        <!-- Tombol Login -->
        <div>
            <a href="{{ url('/login') }}" class="btn px-4 rounded-pill" style="background-color: #081F5C; color:#F2F0DE;">
                Login/Sign In
            </a>
        </div>
    </div>

</nav>
