@extends('layouts.app')

@section('title', 'Edit Inventaris')
@section('page_title', 'Edit Data Inventaris')

@section('content')
<div class="content-card" style="max-width: 800px; margin: 0 auto;">
    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventaris.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Kode Barang</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang', $item->kode_barang) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jumlah</label>
                <input type="number" name="jumlah" value="{{ old('jumlah', $item->jumlah) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Kondisi</label>
                <select name="kondisi" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Baik" {{ $item->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ $item->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ $item->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Pengadaan</label>
                <input type="date" name="tanggal_pengadaan" value="{{ old('tanggal_pengadaan', $item->tanggal_pengadaan->format('Y-m-d')) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nilai Perolehan (Rp)</label>
                <input type="number" name="nilai_perolehan" value="{{ old('nilai_perolehan', round($item->nilai_perolehan)) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('inventaris.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-primary">Perbarui Inventaris</button>
        </div>
    </form>
</div>
@endsection
