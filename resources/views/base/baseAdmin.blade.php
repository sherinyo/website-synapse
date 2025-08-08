<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .wrapper {
            display: flex;
            flex: 1;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            padding-top: 20px;
            flex-shrink: 0;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.2s;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #0d6efd;
            color: white;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            overflow-y: auto;
        }
        .topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <div><strong>Admin Panel</strong></div>
        <div>
            <span class="me-3">👤 {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin logout?');">
                @csrf
                <button class="btn btn-sm btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>

    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ route('admin.homeAdmin') }}" class="{{ request()->routeIs('admin.homeAdmin') ? 'active' : '' }}">🏠 Dashboard</a>
            <a href="{{ route('admin.berita') }}" class="{{ request()->routeIs('admin.berita') ? 'active' : '' }}">📰 Berita</a>
            <a href="{{ route('admin.synapoint') }}" class="{{ request()->routeIs('admin.synapoint') ? 'active' : '' }}">🧠 Synapoint</a>
            <!-- Tambahkan menu lainnya di sini -->
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

</body>
</html>
