<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: sans-serif;
            background-color: #f8f9fa; /* Warna latar belakang konten */
        }

        .wrapper {
            display: flex;
            height: 100%;
        }

        .sidebar {
            width: 260px; /* Lebar sidebar */
            background-color: #343a40; /* Warna gelap untuk sidebar */
            color: white;
            display: flex;
            flex-direction: column; /* Mengatur item secara vertikal */
            justify-content: space-between; /* Mendorong info user ke bawah */
            padding: 20px 0;
            flex-shrink: 0; /* Mencegah sidebar menyusut */
        }

        .sidebar-header {
            padding: 0 20px;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: #adb5bd; /* Warna link abu-abu */
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .nav-links a:hover, .nav-links a.active {
            background-color: #495057;
            color: white;
        }

        .user-section {
            padding: 20px;
            border-top: 1px solid #495057; /* Garis pemisah */
        }

        .user-section .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
            overflow-y: auto; /* Scroll jika konten panjang */
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <div>
                <div class="sidebar-header">
                    Admin SU ISB
                </div>
                <div class="nav-links">
                    {{-- Perbaikan: Atribut href dan class dipisah --}}
                    <a href="{{ url('/homeAdmin') }}" class="active">
                        <i class="bi bi-grid-1x2-fill"></i> Dashboard
                    </a>
                    <a href="{{ url('/beritaAdmin') }}">
                        <i class="bi bi-newspaper"></i> Berita
                    </a>
                    <a href="{{ url('/synapointAdmin') }}">
                        <i class="bi bi-gem"></i> Synapoint
                    </a>
                </div>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <i class="bi bi-person-circle fs-4"></i>
                    <div>
                        {{-- Mengambil nama admin yang login dari guard 'admin' --}}
                        {{-- <div class="fw-bold">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</div> --}}
                        <div class="fw-bold">SHERIN IMUP</div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?');">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <main class="main-content">
            <h1>Selamat Datang, Admin!</h1>
            <p>Ini adalah area konten utama. Anda bisa meletakkan tabel, form, atau komponen lainnya di sini.</p>
            {{-- Contoh: @yield('content') --}}
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
