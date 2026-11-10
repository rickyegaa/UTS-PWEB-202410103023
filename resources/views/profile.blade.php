@extends('layouts.app')

@section('title', 'Profil Pengguna - StokKita')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">Profile Pengelola</div>
    
    <div style="text-align: center; margin: 1.5rem 0;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: #2563eb; color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: bold; margin: 0 auto 1rem;">
            {{ strtoupper(substr($userProfile['username'], 0, 1)) }}
        </div>
        <h3 style="color: #1e293b;">{{ $userProfile['username'] }}</h3>
        <p style="color: #64748b; font-size: 0.9rem;">{{ $userProfile['role'] }}</p>
    </div>

    <table style="border: none;">
        <tr>
            <td style="font-weight: 600; width: 40%; color: #475569;">Username</td>
            <td>: {{ $userProfile['username'] }}</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: #475569;">Email Akun</td>
            <td>: {{ $userProfile['email'] }}</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: #475569;">Hak Akses</td>
            <td>: {{ $userProfile['role'] }}</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: #475569;">Lokasi Penugasan</td>
            <td>: {{ $userProfile['cabang'] }}</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: #475569;">Waktu Akses</td>
            <td>: {{ $userProfile['terakhir_login'] }}</td>
        </tr>
    </table>
</div>
@endsection