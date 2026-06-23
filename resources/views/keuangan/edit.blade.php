@extends('layouts.app')

@section('title', 'Edit Transaksi')
@section('page_title', 'Ubah Data Transaksi Keuangan')

@section('content')
<div class="content-card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('keuangan.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tipe Transaksi</label>
                <select name="tipe" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Pemasukan" {{ $transaksi->tipe === 'Pemasukan' ? 'selected' : '' }}>Pemasukan (Kas Masuk)</option>
                    <option value="Pengeluaran" {{ $transaksi->tipe === 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran (Kas Keluar)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $transaksi->kategori) }}" placeholder="Contoh: Persembahan, Listrik, Operasional" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jumlah (Rp)</label>
                <input type="number" name="jumlah" step="0.01" value="{{ old('jumlah', $transaksi->jumlah) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi->format('Y-m-d')) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Keterangan</label>
                <textarea name="keterangan" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">{{ old('keterangan', $transaksi->keterangan) }}</textarea>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('keuangan.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-success">Perbarui Transaksi</button>
        </div>
    </form>
</div>
@endsection
