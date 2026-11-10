<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Private Helper Method untuk menyimpan Data Master Barang
    private function getBarangData()
    {
        return [
            [
                'kode' => 'BRG-001',
                'nama' => 'Laptop Asus Vivobook 14',
                'kategori' => 'Elektronik',
                'stok' => 15,
                'harga_numeric' => 8500000,
                'harga' => 'Rp 8.500.000',
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'BRG-002',
                'nama' => 'Mouse Wireless Logitech M330',
                'kategori' => 'Aksesori',
                'stok' => 42,
                'harga_numeric' => 250000,
                'harga' => 'Rp 250.000',
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'BRG-003',
                'nama' => 'Keyboard Mekanikal Keychron K2',
                'kategori' => 'Aksesori',
                'stok' => 4,
                'harga_numeric' => 1350000,
                'harga' => 'Rp 1.350.000',
                'status' => 'Stok Menipis'
            ],
            [
                'kode' => 'BRG-004',
                'nama' => 'Monitor Dell UltraSharp 27"',
                'kategori' => 'Elektronik',
                'stok' => 8,
                'harga_numeric' => 4700000,
                'harga' => 'Rp 4.700.000',
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'BRG-005',
                'nama' => 'Headset Bluetooth Sony WH-CH520',
                'kategori' => 'Audio',
                'stok' => 0,
                'harga_numeric' => 799000,
                'harga' => 'Rp 799.000',
                'status' => 'Habis'
            ],
        ];
    }

    // Menampilkan Form Login
    public function showLogin()
    {
        return view('login');
    }

    // Memproses Login & Validasi Username/Password
    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->input('username') === 'ricky' && $request->input('password') === 'ricky123') {
            return redirect()->route('dashboard', ['username' => 'Ricky Ega Pramana'])
                             ->with('success', 'Login Berhasil! Selamat datang kembali, Ricky Ega Pramana.');
        }

        return redirect()->route('login')
                         ->with('error', 'Login Gagal! Username atau Password yang Anda masukkan salah.')
                         ->withInput();
    }

    // Memproses Logout
    public function logout()
    {
        return redirect()->route('login')
                         ->with('success', 'Anda telah berhasil logout dari sistem StokKita.');
    }

    // Menampilkan Dashboard (Hitung Statistik Otomatis dari Array Data Barang)
    public function showDashboard(Request $request)
    {
        $username = $request->query('username', 'Ricky Ega Pramana');
        $barangList = $this->getBarangData();

        // Kalkulasi dinamis dari array barang
        $totalStok = array_sum(array_column($barangList, 'stok'));
        $kategoriCount = count(array_unique(array_column($barangList, 'kategori')));
        $stokMenipisCount = count(array_filter($barangList, function($item) {
            return $item['status'] === 'Stok Menipis';
        }));
        
        $totalNilaiNumeric = 0;
        foreach ($barangList as $item) {
            $totalNilaiNumeric += ($item['stok'] * $item['harga_numeric']);
        }

        $stats = [
            'total_barang' => $totalStok,
            'kategori' => $kategoriCount,
            'stok_menipis' => $stokMenipisCount,
            'total_nilai' => 'Rp ' . number_format($totalNilaiNumeric, 0, ',', '.'),
        ];

        return view('dashboard', compact('username', 'stats'));
    }

    // Menampilkan Halaman Pengelolaan
    public function showPengelolaan(Request $request)
    {
        $username = $request->query('username', 'Ricky Ega Pramana');
        $barangList = $this->getBarangData();

        return view('pengelolaan', compact('username', 'barangList'));
    }

    // Menampilkan Profile Pengguna
    public function showProfile(Request $request)
    {
        $username = $request->query('username', 'Ricky Ega Pramana');

        $userProfile = [
            'username' => 'ricky',
            'nama_lengkap' => $username,
            'email' => 'rickyega@gmail.com',
            'role' => 'Administrator Inventaris',
            'cabang' => 'Gudang Utama Jember',
            'terakhir_login' => date('d F Y, H:i') . ' WIB',
        ];

        return view('profile', compact('username', 'userProfile'));
    }
}