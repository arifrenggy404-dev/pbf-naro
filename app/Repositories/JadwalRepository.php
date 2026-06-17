<?php

namespace App\Repositories;

use App\Models\JadwalPelayanan;
use App\Models\PetugasPelayanan;
use Illuminate\Support\Facades\DB;

class JadwalRepository
{
    public function getAll(array $filters)
    {
        return JadwalPelayanan::with('jemaatPetugas')
            ->when($filters['nama_kegiatan'] ?? null, function ($q, $nama) {
                $q->where('nama_kegiatan', 'like', "%{$nama}%");
            })
            ->when($filters['start_date'] ?? null, function ($q, $start) {
                $q->where('waktu_mulai', '>=', $start);
            })
            ->orderBy('waktu_mulai')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data, array $petugas): JadwalPelayanan
    {
        return DB::transaction(function () use ($data, $petugas) {
            $jadwal = JadwalPelayanan::create($data);
            
            foreach ($petugas as $p) {
                PetugasPelayanan::create([
                    'jadwal_pelayanan_id' => $jadwal->id,
                    'jemaat_id' => $p['jemaat_id'],
                    'peran' => $p['peran']
                ]);
            }
            
            return $jadwal->load('jemaatPetugas');
        });
    }

    public function delete(int $id): bool
    {
        return JadwalPelayanan::findOrFail($id)->delete();
    }
}
