<?php

namespace App\Repositories;

use App\Models\Jemaat;
use Illuminate\Pagination\LengthAwarePaginator;

class JemaatRepository
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        return Jemaat::query()
            ->when($filters['nama'] ?? null, function ($q, $nama) {
                $q->where('nama', 'like', "%{$nama}%");
            })
            ->when($filters['alamat'] ?? null, function ($q, $alamat) {
                $q->where('alamat', 'like', "%{$alamat}%");
            })
            ->when($filters['status'] ?? null, function ($q, $status) {
                $q->where('status_anggota', $status);
            })
            ->orderBy('nama')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function findById(int $id): ?Jemaat
    {
        return Jemaat::with('sakramen')->findOrFail($id);
    }

    public function create(array $data): Jemaat
    {
        return Jemaat::create($data);
    }

    public function update(int $id, array $data): Jemaat
    {
        $jemaat = Jemaat::findOrFail($id);
        $jemaat->update($data);
        return $jemaat;
    }

    public function delete(int $id): bool
    {
        return Jemaat::findOrFail($id)->delete();
    }
}
