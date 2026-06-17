@extends('layouts.app')

@section('title', 'Catat Transaksi')
@section('page_title', 'Input Transaksi Keuangan')

@section('content')
<div class="content-card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('keuangan.store') }}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tipe Transaksi</label>
                <select name="tipe" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Pemasukan">Pemasukan (Kas Masuk)</option>
                    <option value="Pengeluaran">Pengeluaran (Kas Keluar)</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Kategori</label>
                <input type="text" name="kategori" placeholder="Contoh: Persembahan, Listrik, Operasional" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jumlah (Rp)</label>
                <input type="number" name="jumlah" step="0.01" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Transaksi</label>
                <input type="date" name="tanggal_transaksi" value="{{ date('Y-m-d') }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Keterangan</label>
                <textarea name="keterangan" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></textarea>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('keuangan.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        </div>
    </form>
</div>
@endsection
