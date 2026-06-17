@extends('layouts.app')

@section('title', 'Edit Jemaat')
@section('page_title', 'Edit Data Jemaat')

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

    <form action="{{ route('jemaat.update', $jemaat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $jemaat->nama) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jenis Kelamin</label>
                <select name="jenis_kelamin" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="L" {{ $jemaat->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $jemaat->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $jemaat->tanggal_lahir->format('Y-m-d')) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Status Anggota</label>
                <select name="status_anggota" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Aktif" {{ $jemaat->status_anggota == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Pindah" {{ $jemaat->status_anggota == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                    <option value="Meninggal" {{ $jemaat->status_anggota == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                </select>
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Alamat</label>
                <textarea name="alamat" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">{{ old('alamat', $jemaat->alamat) }}</textarea>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $jemaat->telepon) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Bergabung</label>
                <input type="date" name="tanggal_bergabung" value="{{ old('tanggal_bergabung', $jemaat->tanggal_bergabung->format('Y-m-d')) }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('jemaat.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-primary">Perbarui Data Jemaat</button>
        </div>
    </form>
</div>
@endsection
