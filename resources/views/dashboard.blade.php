@extends('layouts.app')

@section('title', 'Dashboard - StokKita')

@section('content')
<div class="card">
    <h2>Selamat Datang, {{ $username }}! 👋</h2>
    <p style="color: #64748b; margin-top: 0.5rem;">Berikut ringkasan statistik inventaris toko StokKita hari ini.</p>
</div>

<div class="grid-stats">
    <div class="stat-card">
        <h4>TOTAL BARANG</h4>
        <p>{{ number_format($stats['total_barang']) }} Unit</p>
    </div>
    <div class="stat-card" style="border-left-color: #10b981;">
        <h4>KATEGORI BARANG</h4>
        <p>{{ $stats['kategori'] }} Kategori</p>
    </div>
    <div class="stat-card" style="border-left-color: #f59e0b;">
        <h4>STOK MENIPIS</h4>
        <p>{{ $stats['stok_menipis'] }} Produk</p>
    </div>
    <div class="stat-card" style="border-left-color: #8b5cf6;">
        <h4>NILAI INVENTARIS</h4>
        <p>{{ $stats['total_nilai'] }}</p>
    </div>
</div>

<div class="card">
    <div class="card-header">Informasi Aktivitas Admin</div>
    <p style="line-height: 1.6;">Anda saat ini login sebagai <strong>{{ $username }}</strong>. Semua perubahan data barang di halaman pengelolaan akan tercatat atas nama akun ini.</p>
    <div style="margin-top: 1.5rem;">
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn">Kelola Data Barang &rarr;</a>
    </div>
</div>
@endsection