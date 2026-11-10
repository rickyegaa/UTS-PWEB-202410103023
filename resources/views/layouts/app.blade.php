<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StokKita - Sistem Inventaris')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; flex-direction: column; min-height: 100vh; }
        .main-content { flex: 1; padding: 2rem 1.5rem; max-width: 1200px; margin: 0 auto; width: 100%; }
        .card { background: #ffffff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); margin-bottom: 1.5rem; }
        .card-header { font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { text-align: left; padding: 12px 15px; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #0f172a; color: #ffffff; font-weight: 600; }
        tr:hover { background-color: #f8fafc; }
        .badge { padding: 4px 10px; border-radius: 12px; font-size: 0.85rem; font-weight: 600; }
        .badge-success { background-color: #d1fae5; color: #065f46; }
        .badge-warning { background-color: #fef3c7; color: #92400e; }
        .badge-danger { background-color: #fee2e2; color: #991b1b; }
        .grid-stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 1.5rem; }
        .stat-card { background: white; padding: 1.25rem; border-radius: 8px; border-left: 5px solid #2563eb; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); }
        .stat-card h4 { font-size: 0.9rem; color: #64748b; font-weight: 500; }
        .stat-card p { font-size: 1.5rem; font-weight: bold; color: #1e293b; margin-top: 0.25rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
        .form-group input { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem; }
        .btn { display: inline-block; padding: 0.75rem 1.5rem; background-color: #2563eb; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; text-decoration: none; font-weight: 600; text-align: center; }
        .btn:hover { background-color: #1d4ed8; }
        
        /* Style Alert Notifikasi */
        .alert { padding: 1rem 1.25rem; border-radius: 6px; margin-bottom: 1.5rem; font-weight: 600; font-size: 0.95rem; }
        .alert-success { background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
    </style>
</head>
<body>

    @include('components.navbar')

    <main class="main-content">
        {{-- Flash Alert Global --}}
        @if(session('success'))
            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                ❌ {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>