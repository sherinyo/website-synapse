<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .wrapper {
            display: flex;
            height: 100%;
        }
        .sidebar {
            width: 260px;
            background-color: #343a40;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 0;
            flex-shrink: 0;
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
            color: #adb5bd;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active {
            background-color: #495057;
            color: white;
        }
        .user-section {
            padding: 20px;
            border-top: 1px solid #495057;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        .main-content {
            flex-grow: 1;
            padding: 30px;
            overflow-y: auto;
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
                    <a href="{{ route('admin.homeAdmin') }}" class="{{ request()->routeIs('admin.homeAdmin') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i> Dashboard
                    </a>
                    <a href="{{ url('admin.beritaAdmin') }}" class="{{ request()->is('admin.beritaAdmin') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i> Berita
                    </a>
                    <a href="{{ url('admin.synapoint') }}" class="{{ request()->is('admin.synapoint*') ? 'active' : '' }}">
                        <i class="bi bi-gem"></i> Synapoint
                    </a>
                    <a href="{{ url('admin.dataUser') }}" class="{{ request()->is('admin.dataUser*') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i> All User
                    </a>
                </div>
            </div>

            <div class="user-section">
                <div class="user-info">
                    <i class="bi bi-person-circle fs-4"></i>
                    <div>
                        {{-- Mengambil nama admin yang login --}}
                        <div class="fw-bold">{{ Auth::user()->name ?? 'Admin' }}</div>
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
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
