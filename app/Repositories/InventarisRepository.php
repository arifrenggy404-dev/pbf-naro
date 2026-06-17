<?php

namespace App\Repositories;

use App\Models\Inventaris;
use Illuminate\Pagination\LengthAwarePaginator;

class InventarisRepository
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        return Inventaris::query()
            ->when($filters['nama_barang'] ?? null, function ($q, $nama) {
                $q->where('nama_barang', 'like', "%{$nama}%");
            })
            ->when($filters['kode_barang'] ?? null, function ($q, $kode) {
                $q->where('kode_barang', 'like', "%{$kode}%");
            })
            ->when($filters['kondisi'] ?? null, function ($q, $kondisi) {
                $q->where('kondisi', $kondisi);
            })
            ->orderBy('nama_barang')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Inventaris
    {
        return Inventaris::create($data);
    }

    public function update(int $id, array $data): Inventaris
    {
        $item = Inventaris::findOrFail($id);
        $item->update($data);
        return $item;
    }

    public function delete(int $id): bool
    {
        return Inventaris::findOrFail($id)->delete();
    }

    public function getAssetSummary()
    {
        return Inventaris::query()
            ->selectRaw('kondisi, count(*) as total')
            ->groupBy('kondisi')
            ->get();
    }
}
