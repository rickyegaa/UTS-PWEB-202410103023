@extends('layouts.app')

@section('title', 'Pengelolaan Inventaris - StokKita')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <span>Daftar Inventaris Barang</span>
        <span style="font-size: 0.9rem; font-weight: normal; color: #64748b;">Pengelola: <strong>{{ $username }}</strong></span>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga Satuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangList as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $item['kode'] }}</strong></td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['kategori'] }}</td>
                <td>{{ $item['stok'] }} Pcs</td>
                <td>{{ $item['harga'] }}</td>
                <td>
                    @if($item['status'] === 'Tersedia')
                        <span class="badge badge-success">Tersedia</span>
                    @elseif($item['status'] === 'Stok Menipis')
                        <span class="badge badge-warning">Stok Menipis</span>
                    @else
                        <span class="badge badge-danger">Habis</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection