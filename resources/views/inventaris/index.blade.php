@extends('layouts.app')

@section('title', 'Manajemen Inventaris')
@section('page_title', 'Aset & Inventaris Gereja')

@section('content')
<div class="stats-grid">
    @foreach($summary as $stat)
    <div class="stat-card">
        <i class="fas {{ $stat->kondisi == 'Baik' ? 'fa-check-circle' : ($stat->kondisi == 'Rusak Ringan' ? 'fa-exclamation-triangle' : 'fa-times-circle') }}" 
           style="color: {{ $stat->kondisi == 'Baik' ? 'var(--success-color)' : ($stat->kondisi == 'Rusak Ringan' ? '#f39c12' : 'var(--danger-color)') }};"></i>
        <div class="info">
            <h3>{{ $stat->kondisi }}</h3>
            <p>{{ $stat->total }} Item</p>
        </div>
    </div>
    @endforeach
</div>

<div class="content-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <form action="{{ route('inventaris.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="nama_barang" placeholder="Cari barang..." value="{{ request('nama_barang') }}" style="padding: 10px; border: 1px solid #ddd; border-radius: 8px; width: 300px;">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
        </form>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('inventaris.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Barang</a>
            <a href="{{ route('inventaris.report') }}" class="btn btn-primary"><i class="fas fa-print"></i> Laporan</a>
        </div>
    </div>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Tanggal Pengadaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr>
                    <td><code style="background: #f8f9fa; padding: 2px 5px; border-radius: 4px;">{{ $item->kode_barang }}</code></td>
                    <td><strong>{{ $item->nama_barang }}</strong></td>
                    <td>{{ $item->jumlah }}</td>
                    <td><span style="color: {{ $item->kondisi == 'Baik' ? 'var(--success-color)' : ($item->kondisi == 'Rusak Ringan' ? '#f39c12' : 'var(--danger-color)') }}; background: #f8f9fa; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;">{{ $item->kondisi }}</span></td>
                    <td>{{ $item->tanggal_pengadaan->format('d M Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('inventaris.edit', $item->id) }}" class="btn btn-primary" style="padding: 5px 10px;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus aset ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #7f8c8d;">Data inventaris kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
