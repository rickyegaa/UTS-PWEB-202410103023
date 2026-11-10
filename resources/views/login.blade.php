@extends('layouts.app')

@section('title', 'Login - StokKita')

@section('content')
<div style="max-width: 420px; margin: 2rem auto;">
    <div class="card" style="padding: 2rem;">
        <h2 style="text-align: center; margin-bottom: 0.5rem; color: #1e293b;">Masuk ke StokKita</h2>
        <p style="text-align: center; color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem;">Sistem Manajemen Inventaris Toko</p>

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan Username" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <button type="submit" class="btn" style="width: 100%; font-size: 1rem;">Masuk Dashboard</button>
        </form>
    </div>
</div>
@endsection