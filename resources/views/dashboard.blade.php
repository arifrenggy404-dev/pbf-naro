@extends('layouts.app')

@section('page_title')
    Dashboard {{ Auth::user()->role }}
@endsection

@section('content')
<div style="margin-bottom: 25px; padding: 20px; background: #fff; border-radius: 12px; border-left: 5px solid var(--accent-color);">
    <h2 style="font-size: 1.2rem;">Halo, {{ Auth::user()->name }}!</h2>
    <p style="color: #7f8c8d;">Anda login sebagai <strong>{{ Auth::user()->role }}</strong>. Berikut adalah ringkasan data yang relevan dengan tugas Anda.</p>
</div>

<div class="stats-grid">
    @if(Auth::user()->isAdmin())
    <div class="stat-card">
        <i class="fas fa-users"></i>
        <div class="info">
            <h3>Total Jemaat</h3>
            <p>{{ $stats['total_jemaat'] ?? 0 }}</p>
        </div>
    </div>
    <div class="stat-card">
        <i class="fas fa-cross"></i>
        <div class="info">
            <h3>Data Sakramen</h3>
            <p>{{ $stats['total_sakramen'] ?? 0 }}</p>
        </div>
    </div>
    <div class="stat-card">
        <i class="fas fa-box-open"></i>
        <div class="info">
            <h3>Aset Inventaris</h3>
            <p>{{ $stats['total_inventaris'] ?? 0 }}</p>
        </div>
    </div>
    @endif

    @if(Auth::user()->isKoordinator())
    <div class="stat-card">
        <i class="fas fa-calendar-check"></i>
        <div class="info">
            <h3>Jadwal Minggu Ini</h3>
            <p>{{ $stats['jadwal_minggu_ini'] ?? 0 }} Kegiatan</p>
        </div>
    </div>
    @endif

    @if(Auth::user()->isBendahara())
    <div class="stat-card">
        <i class="fas fa-hand-holding-heart"></i>
        <div class="info">
            <h3>Saldo Kas</h3>
            <p>Rp {{ number_format($stats['saldo'] ?? 0, 0, ',', '.') }}</p>
        </div>
    </div>
    @endif
</div>

<div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
    @if(Auth::user()->isAdmin() && isset($stats['latest_jemaat']))
    <div class="content-card">
        <h2 style="font-size: 1.2rem; margin-bottom: 20px;">Jemaat Baru Bergabung</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['latest_jemaat'] as $j)
                    <tr>
                        <td>{{ $j->nama }}</td>
                        <td><span style="color: var(--success-color);">{{ $j->status_anggota }}</span></td>
                        <td><a href="{{ route('jemaat.index') }}" class="btn btn-primary" style="padding: 2px 8px;"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if(Auth::user()->isKoordinator() && isset($stats['upcoming_jadwal']))
    <div class="content-card">
        <h2 style="font-size: 1.2rem; margin-bottom: 20px;">Kegiatan Mendatang</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kegiatan</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stats['upcoming_jadwal'] as $j)
                    <tr>
                        <td>{{ $j->nama_kegiatan }}</td>
                        <td>{{ $j->waktu_mulai->format('d M Y, H:i') }}</td>
                        <td>{{ $j->lokasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if(Auth::user()->isBendahara() && isset($stats['latest_transaksi']))
    <div class="content-card">
        <h2 style="font-size: 1.2rem; margin-bottom: 20px;">Transaksi Terakhir</h2>
        <ul style="list-style: none;">
            @foreach($stats['latest_transaksi'] as $t)
            <li style="display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #eee;">
                <div>
                    <p style="font-weight: 600; font-size: 0.9rem;">{{ $t->kategori }}</p>
                    <p style="font-size: 0.8rem; color: #7f8c8d;">{{ $t->tanggal_transaksi->format('d M Y') }}</p>
                </div>
                <span style="color: {{ $t->tipe == 'Pemasukan' ? 'var(--success-color)' : 'var(--danger-color)' }}; font-weight: bold;">
                    {{ $t->tipe == 'Pemasukan' ? '+' : '-' }}Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection
