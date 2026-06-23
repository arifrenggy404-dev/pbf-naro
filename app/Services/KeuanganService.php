<?php

namespace App\Services;

use App\Repositories\KeuanganRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Exception;

class KeuanganService
{
    protected $repository;

    public function __construct(KeuanganRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listTransactions(array $filters)
    {
        return $this->repository->getAll($filters);
    }

    public function recordTransaction(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                $data['nomor_transaksi'] = $this->generateTransactionNumber($data['tipe']);
                $data['created_by'] = Auth::id() ?? 1; // Default to admin if not auth for now
                
                return $this->repository->create($data);
            });
        } catch (Exception $e) {
            Log::error("Gagal mencatat transaksi keuangan: " . $e->getMessage());
            throw $e;
        }
    }

    public function getFinancialReport(string $startDate, string $endDate)
    {
        $summary = $this->repository->getSummary([$startDate, $endDate]);
        
        return [
            'pemasukan' => $summary->total_pemasukan ?? 0,
            'pengeluaran' => $summary->total_pengeluaran ?? 0,
            'saldo' => ($summary->total_pemasukan ?? 0) - ($summary->total_pengeluaran ?? 0)
        ];
    }

    public function getTransaction(int $id)
    {
        return $this->repository->findById($id);
    }

    public function updateTransaction(int $id, array $data)
    {
        try {
            return DB::transaction(function () use ($id, $data) {
                // If type changed, we might generate a new transaction number or keep the old one.
                // Keeping the old one is standard unless specified otherwise. Let's keep it.
                return $this->repository->update($id, $data);
            });
        } catch (Exception $e) {
            Log::error("Gagal memperbarui transaksi keuangan ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    public function deleteTransaction(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $e) {
            Log::error("Gagal menghapus transaksi keuangan ID {$id}: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Generate unique transaction number: TX-[IN/OUT]-YYYYMMDD-RAND
     */
    private function generateTransactionNumber(string $tipe): string
    {
        $prefix = $tipe === 'Pemasukan' ? 'IN' : 'OUT';
        $date = now()->format('Ymd');
        $random = strtoupper(bin2hex(random_bytes(3)));
        
        return "TX-{$prefix}-{$date}-{$random}";
    }
}
