@extends('layouts.app')

@section('title', 'Laporan Keuangan')
@section('page_title', 'Kas & Keuangan')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <i class="fas fa-arrow-circle-up" style="color: var(--success-color);"></i>
        <div class="info">
            <h3>Pemasukan</h3>
            <p>Rp {{ number_format($report['pemasukan'], 0, ',', '.') }}</p>
        </div>
    </div>
    <div class="stat-card">
        <i class="fas fa-arrow-circle-down" style="color: var(--danger-color);"></i>
        <div class="info">
            <h3>Pengeluaran</h3>
            <p>Rp {{ number_format($report['pengeluaran'], 0, ',', '.') }}</p>
        </div>
    </div>
    <div class="stat-card">
        <i class="fas fa-balance-scale"></i>
        <div class="info">
            <h3>Saldo Kas</h3>
            <p>Rp {{ number_format($report['saldo'], 0, ',', '.') }}</p>
        </div>
    </div>
</div>

<div class="content-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="font-size: 1.2rem;">Riwayat Transaksi</h2>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('keuangan.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Catat Transaksi</a>
            <a href="{{ route('keuangan.report') }}" class="btn btn-primary"><i class="fas fa-file-export"></i> Laporan</a>
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
                    <th>Tanggal</th>
                    <th>Nomor Transaksi</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $item)
                <tr>
                    <td>{{ $item->tanggal_transaksi->format('d M Y') }}</td>
                    <td><code style="background: #f8f9fa; padding: 2px 5px; border-radius: 4px;">{{ $item->nomor_transaksi }}</code></td>
                    <td>{{ $item->kategori }}</td>
                    <td><span style="color: {{ $item->tipe == 'Pemasukan' ? 'var(--success-color)' : 'var(--danger-color)' }}; font-weight: 600;">{{ $item->tipe }}</span></td>
                    <td style="font-weight: bold;">{{ $item->tipe == 'Pengeluaran' ? '-' : '' }}Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn" style="background: #f8f9fa;"><i class="fas fa-eye"></i></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #7f8c8d;">Belum ada transaksi tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
