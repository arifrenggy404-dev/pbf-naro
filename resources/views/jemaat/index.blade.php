@extends('layouts.app')

@section('title', 'Manajemen Jemaat')
@section('page_title', 'Daftar Jemaat')

@section('content')
<div class="content-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <form action="{{ route('jemaat.index') }}" method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="nama" placeholder="Cari jemaat..." value="{{ request('nama') }}" style="padding: 10px; border: 1px solid #ddd; border-radius: 8px; width: 300px;">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
        </form>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('jemaat.report') }}" class="btn" style="background: #6c757d; color: #fff;"><i class="fas fa-file-pdf"></i> Laporan</a>
            <a href="{{ route('jemaat.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Jemaat</a>
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
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jemaat as $item)
                <tr>
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td><span style="color: {{ $item->status_anggota == 'Aktif' ? 'var(--success-color)' : 'var(--danger-color)' }}; background: #eafaf1; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;">{{ $item->status_anggota }}</span></td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('jemaat.edit', $item->id) }}" class="btn btn-primary" style="padding: 5px 10px;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('jemaat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #7f8c8d;">Data jemaat masih kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px;">
        {{ $jemaat->links() }}
    </div>
</div>
@endsection
