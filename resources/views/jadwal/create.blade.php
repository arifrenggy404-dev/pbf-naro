@extends('layouts.app')

@section('title', 'Buat Jadwal')
@section('page_title', 'Buat Jadwal Pelayanan Baru')

@section('content')
<div class="content-card" style="max-width: 800px; margin: 0 auto;">
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" placeholder="Contoh: Ibadah Raya Minggu" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Waktu Mulai</label>
                <input type="datetime-local" name="waktu_mulai" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Waktu Selesai</label>
                <input type="datetime-local" name="waktu_selesai" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Lokasi</label>
                <input type="text" name="lokasi" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3 style="margin-bottom: 15px; font-size: 1.1rem;">Penugasan Petugas</h3>
            <div id="petugas-container">
                <div class="petugas-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                    <select name="petugas[0][jemaat_id]" style="flex: 2; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                        <option value="">-- Pilih Petugas --</option>
                        @foreach($jemaat as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="petugas[0][peran]" placeholder="Peran (e.g. Pendeta)" style="flex: 1; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                </div>
            </div>
            <p style="font-size: 0.8rem; color: #7f8c8d; margin-top: 5px;">* Untuk saat ini silahkan isi minimal satu petugas.</p>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('jadwal.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-success">Buat Jadwal</button>
        </div>
    </form>
</div>
@endsection
