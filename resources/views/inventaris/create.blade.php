@extends('layouts.app')

@section('title', 'Tambah Inventaris')
@section('page_title', 'Input Aset Baru')

@section('content')
<div class="content-card" style="max-width: 600px; margin: 0 auto;">
    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventaris.store') }}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Kode Barang</label>
                <input type="text" name="kode_barang" placeholder="Contoh: INV-001" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nama Barang</label>
                <input type="text" name="nama_barang" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jumlah</label>
                <input type="number" name="jumlah" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Kondisi</label>
                <select name="kondisi" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Pengadaan</label>
                <input type="date" name="tanggal_pengadaan" value="{{ date('Y-m-d') }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nilai Perolehan (Rp)</label>
                <input type="number" name="nilai_perolehan" step="0.01" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('inventaris.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Aset</button>
        </div>
    </form>
</div>
@endsection
