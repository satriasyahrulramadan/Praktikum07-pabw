<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaporBanjir - BPBD Kabupaten Bandung</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 960px; margin: 0 auto; padding: 20px; }
        nav { display: flex; gap: 15px; align-items: center; flex-wrap: wrap; }
        nav form { margin: 0; }
        label { display: block; font-weight: bold; margin-bottom: 4px; }
        input:not([type=checkbox]), select, textarea { display: block; margin-bottom: 4px; padding: 8px; width: 100%; box-sizing: border-box; }
        .field { margin-bottom: 14px; }
        .error { color: #c0392b; font-size: 0.9em; }
        .btn { display: inline-block; padding: 6px 12px; border: 0; border-radius: 4px; background: #2563eb; color: #fff; text-decoration: none; cursor: pointer; font-size: 14px; }
        .btn-warning { background: #d4a000; }
        .btn-danger { background: #c0392b; }
        .btn-secondary { background: #6b7280; }
        .card { border: 1px solid #ccc; border-radius: 6px; padding: 12px; margin-bottom: 12px; }
        .badge { padding: 3px 10px; border-radius: 4px; color: #fff; font-weight: bold; font-size: 13px; }
        .Waspada { background: #d4a000; }
        .Siaga { background: #e67e22; }
        .Awas { background: #c0392b; }
        .Menunggu { background: #6b7280; }
        .Diproses { background: #2563eb; }
        .Selesai { background: #16a34a; }
        .alert { padding: 12px; border-radius: 6px; margin-bottom: 15px; }
        .alert-success { background: #d4edda; }
        .alert-info { background: #d1ecf1; }
        .alert-danger { background: #f8d7da; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; vertical-align: middle; }
        th { background: #f3f4f6; }
        .thumb { width: 70px; height: 70px; object-fit: cover; border-radius: 4px; }
        .foto-detail { max-width: 100%; max-height: 400px; border-radius: 6px; }
        .aksi { display: flex; gap: 6px; flex-wrap: wrap; }
        .aksi form { margin: 0; }
        .pagination { display: flex; list-style: none; gap: 4px; padding: 0; margin: 15px 0; flex-wrap: wrap; }
        .page-link { display: block; padding: 6px 12px; border: 1px solid #ccc; border-radius: 4px; text-decoration: none; color: #2563eb; }
        .pagination .active .page-link { background: #2563eb; color: #fff; border-color: #2563eb; }
        .pagination .disabled .page-link { color: #aaa; }
        .table-wrap { overflow-x: auto; }
    </style>
</head>
<body>
    <h1>LaporBanjir</h1>
    <nav>
        <a href="{{ route('lapor.create') }}">Buat Laporan</a>
        @auth
            <a href="{{ route('laporan.index') }}">Kelola Laporan</a>
            <span>({{ auth()->user()->name }})</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login Petugas</a>
            <a href="{{ route('register') }}">Daftar Petugas</a>
        @endauth
    </nav>
    <hr>

    @if (session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
    @endif

    @yield('content')
</body>
</html>