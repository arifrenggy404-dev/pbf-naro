@extends('layouts.app')

@section('title', 'Jadwal Pelayanan')
@section('page_title', 'Manajemen Jadwal & Petugas')

@section('content')
<div class="content-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="font-size: 1.2rem;">Jadwal Pelayanan Mendatang</h2>
        <a href="{{ route('jadwal.create') }}" class="btn btn-success"><i class="fas fa-calendar-plus"></i> Buat Jadwal Baru</a>
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
                    <th>Kegiatan</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Petugas (Role)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwal as $item)
                <tr>
                    <td><strong>{{ $item->nama_kegiatan }}</strong></td>
                    <td>{{ $item->waktu_mulai->format('d M Y, H:i') }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        <ul style="list-style: none; font-size: 0.85rem; padding: 0;">
                            @foreach($item->jemaatPetugas as $petugas)
                            <li><i class="fas fa-user"></i> {{ $petugas->nama }} ({{ $petugas->pivot->peran }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-primary" style="padding: 5px 10px;"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Batalkan jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px;"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #7f8c8d;">Belum ada jadwal pelayanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
