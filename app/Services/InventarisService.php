<?php

namespace App\Services;

use App\Repositories\InventarisRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class InventarisService
{
    protected $repository;

    public function __construct(InventarisRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listItems(array $filters)
    {
        return $this->repository->getAll($filters);
    }

    public function createItem(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                return $this->repository->create($data);
            });
        } catch (Exception $e) {
            Log::error("Gagal menambah inventaris: " . $e->getMessage());
            throw $e;
        }
    }

    public function getAssetReport()
    {
        return $this->repository->getAssetSummary();
    }
}
