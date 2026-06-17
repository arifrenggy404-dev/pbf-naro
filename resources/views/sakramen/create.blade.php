@extends('layouts.app')

@section('title', 'Tambah Sakramen')
@section('page_title', 'Input Catatan Sakramen')

@section('content')
<div class="content-card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('sakramen.store') }}" method="POST">
        @csrf
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Pilih Jemaat</label>
                <select name="jemaat_id" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="">-- Pilih Jemaat --</option>
                    @foreach($jemaat as $j)
                        <option value="{{ $j->id }}">{{ $j->nama }} ({{ $j->status_anggota }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Jenis Sakramen</label>
                <select name="jenis_sakramen" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
                    <option value="Baptis">Baptis</option>
                    <option value="Komuni">Komuni</option>
                    <option value="Krisma">Krisma</option>
                    <option value="Pernikahan">Pernikahan</option>
                    <option value="Kematian">Kematian</option>
                </select>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" value="{{ date('Y-m-d') }}" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Tempat Pelaksanaan</label>
                <input type="text" name="tempat_pelaksanaan" placeholder="Contoh: Gedung Utama Gereja" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;" required>
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Pendeta Pelayan</label>
                <input type="text" name="pendeta_pelayan" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
            </div>
            <div class="form-group">
                <label style="display:block; margin-bottom:8px; font-weight:600;">Catatan Tambahan</label>
                <textarea name="catatan" rows="3" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></textarea>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 10px; justify-content: flex-end;">
            <a href="{{ route('sakramen.index') }}" class="btn" style="background:#eee; color:#333;">Batal</a>
            <button type="submit" class="btn btn-success">Simpan Catatan</button>
        </div>
    </form>
</div>
@endsection
