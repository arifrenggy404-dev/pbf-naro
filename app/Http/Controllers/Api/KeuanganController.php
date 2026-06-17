<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\StoreKeuanganRequest;
use App\Services\KeuanganService;
use Illuminate\Http\Request;
use Exception;

class KeuanganController extends Controller
{
    protected $service;

    public function __construct(KeuanganService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->listTransactions($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Daftar transaksi berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(StoreKeuanganRequest $request)
    {
        try {
            $transaksi = $this->service->recordTransaction($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil dicatat',
                'data' => $transaksi
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mencatat transaksi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function report(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $report = $this->service->getFinancialReport($request->start_date, $request->end_date);
        
        return response()->json([
            'success' => true,
            'message' => 'Laporan keuangan berhasil di-generate',
            'data' => $report
        ]);
    }
}
