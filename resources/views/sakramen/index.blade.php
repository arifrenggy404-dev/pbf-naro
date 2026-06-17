@extends('layouts.app')

@section('title', 'Manajemen Sakramen')
@section('page_title', 'Catatan Sakramen Jemaat')

@section('content')
<div class="content-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="font-size: 1.2rem;">Riwayat Sakramen</h2>
        <a href="{{ route('sakramen.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Catatan Sakramen</a>
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
                    <th>Nama Jemaat</th>
                    <th>Jenis Sakramen</th>
                    <th>Tanggal</th>
                    <th>Pendeta Pelayan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sakramen as $item)
                <tr>
                    <td><strong>{{ $item->jemaat->nama }}</strong></td>
                    <td><span style="color: var(--accent-color); font-weight: 600;">{{ $item->jenis_sakramen }}</span></td>
                    <td>{{ $item->tanggal_pelaksanaan->format('d M Y') }}</td>
                    <td>{{ $item->pendeta_pelayan }}</td>
                    <td>
                        <form action="{{ route('sakramen.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data sakramen ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px;"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #7f8c8d;">Belum ada catatan sakramen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px;">
        {{ $sakramen->links() }}
    </div>
</div>
@endsection
