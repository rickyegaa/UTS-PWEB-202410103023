<style>
    .nav-link {
        text-decoration: none;
        font-weight: 600;
        color: #cbd5e1;
        padding-bottom: 4px;
        transition: all 0.2s ease;
    }
    .nav-link:hover {
        color: #38bdf8;
    }
    .nav-link.active {
        color: #38bdf8;
        border-bottom: 2px solid #38bdf8;
    }
    .nav-link-logout {
        color: #ef4444;
        text-decoration: none;
        font-weight: 600;
        margin-left: 1rem;
    }
    .nav-link-logout:hover {
        color: #dc2626;
    }
</style>

<nav style="background-color: #0f172a; color: white; padding: 1rem 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 1.4rem; font-weight: bold; letter-spacing: 0.5px; color: #38bdf8;">
            📦 StokKita
        </div>

        {{-- Menu Navigasi Hanya Muncul Jika BUKAN Halaman Login --}}
        @if(!request()->routeIs('login'))
        <div style="display: flex; gap: 1.5rem; align-items: center;">
            <a href="{{ route('dashboard', ['username' => request('username')]) }}" 
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            
            <a href="{{ route('pengelolaan', ['username' => request('username')]) }}" 
               class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
                Pengelolaan
            </a>
            
            <a href="{{ route('profile', ['username' => request('username')]) }}" 
               class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                Profile
            </a>
            
            <a href="{{ route('logout') }}" class="nav-link-logout">
                Keluar
            </a>
        </div>
        @endif
    </div>
</nav>