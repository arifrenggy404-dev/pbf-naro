<?php

namespace App\Services;

use App\Repositories\JemaatRepository;
use App\Models\Jemaat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class JemaatService
{
    protected $repository;

    public function __construct(JemaatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listJemaat(array $filters)
    {
        return $this->repository->getAll($filters);
    }

    public function getJemaat(int $id)
    {
        return $this->repository->findById($id);
    }

    public function createJemaat(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                return $this->repository->create($data);
            });
        } catch (Exception $e) {
            Log::error("Gagal menambahkan jemaat: " . $e->getMessage());
            throw $e;
        }
    }

    public function updateJemaat(int $id, array $data)
    {
        try {
            return DB::transaction(function () use ($id, $data) {
                return $this->repository->update($id, $data);
            });
        } catch (Exception $e) {
            Log::error("Gagal memperbarui jemaat ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    public function deleteJemaat(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            Log::error("Gagal menghapus jemaat ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Batch update status jemaat untuk pembaruan tahunan.
     */
    public function performAnnualStatusUpdate()
    {
        return Jemaat::where('last_data_update', '<', now()->subYear())
            ->where('status_anggota', 'Aktif')
            ->update(['status_anggota' => 'Aktif']); // Logika bisa disesuaikan, misal flagging untuk konfirmasi ulang
    }
}
