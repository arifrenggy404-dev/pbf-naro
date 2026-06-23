<?php

namespace App\Repositories;

use App\Models\Keuangan;
use Illuminate\Pagination\LengthAwarePaginator;

class KeuanganRepository
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        return Keuangan::query()
            ->when($filters['tipe'] ?? null, function ($q, $tipe) {
                $q->where('tipe', $tipe);
            })
            ->when($filters['kategori'] ?? null, function ($q, $kategori) {
                $q->where('kategori', $kategori);
            })
            ->when($filters['start_date'] ?? null, function ($q, $start) {
                $q->where('tanggal_transaksi', '>=', $start);
            })
            ->when($filters['end_date'] ?? null, function ($q, $end) {
                $q->where('tanggal_transaksi', '<=', $end);
            })
            ->orderByDesc('tanggal_transaksi')
            ->paginate($filters['per_page'] ?? 15);
    }

    public function create(array $data): Keuangan
    {
        return Keuangan::create($data);
    }

    public function getSummary(array $dateRange)
    {
        return Keuangan::query()
            ->whereBetween('tanggal_transaksi', $dateRange)
            ->selectRaw("SUM(CASE WHEN tipe = 'Pemasukan' THEN jumlah ELSE 0 END) as total_pemasukan")
            ->selectRaw("SUM(CASE WHEN tipe = 'Pengeluaran' THEN jumlah ELSE 0 END) as total_pengeluaran")
            ->first();
    }

    public function findById(int $id): Keuangan
    {
        return Keuangan::findOrFail($id);
    }

    public function update(int $id, array $data): Keuangan
    {
        $transaction = Keuangan::findOrFail($id);
        $transaction->update($data);
        return $transaction;
    }

    public function delete(int $id): bool
    {
        return Keuangan::findOrFail($id)->delete();
    }
}
