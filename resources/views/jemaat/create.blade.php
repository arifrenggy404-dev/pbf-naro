@extends('layouts.app')

@section('title', 'Tambah Jemaat')
@section('page_title', 'Tambah Jemaat Baru')

@section('content')
<div class="content-card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('jemaat.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nama Lengkap</label>
                <input type="text" name="nama" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jenis Kelamin</label>
                <select name="jenis_kelamin" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Status Anggota</label>
                <select name="status_anggota" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Pindah">Pindah</option>
                    <option value="Meninggal">Meninggal</option>
                </select>
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Alamat</label>
                <textarea name="alamat" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></textarea>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Telepon</label>
                <input type="text" name="telepon" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Bergabung</label>
                <input type="date" name="tanggal_bergabung" value="{{ date('Y-m-d') }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('jemaat.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Data Jemaat</button>
        </div>
    </form>
</div>
@endsection
