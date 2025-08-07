<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding-top: 20px;
            border-right: 1px solid #dee2e6;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #0d6efd;
            color: white;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="px-3 mb-4">
            <strong>{{ Auth::user()->name }}</strong>
            <div class="text-muted" style="font-size: 0.85rem;">Admin</div>
        </div>
        <a href="{{ route('admin.home') }}" class="{{ request()->routeIs('admin.home') ? 'active' : '' }}">🏠 Home</a>
        <a href="{{ route('admin.berita') }}" class="{{ request()->routeIs('admin.berita') ? 'active' : '' }}">📰 Berita</a>
        <a href="{{ route('admin.synapoint') }}" class="{{ request()->routeIs('admin.synapoint') ? 'active' : '' }}">🧠 Synapoint</a>

        <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
            @csrf
            <button class="btn btn-outline-danger w-100">Logout</button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
