<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventaris\StoreInventarisRequest;
use App\Services\InventarisService;
use Illuminate\Http\Request;
use Exception;

class InventarisController extends Controller
{
    protected $service;

    public function __construct(InventarisService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->listItems($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Daftar inventaris berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(StoreInventarisRequest $request)
    {
        try {
            $item = $this->service->createItem($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Barang inventaris berhasil ditambahkan',
                'data' => $item
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambah barang: ' . $e->getMessage()
            ], 500);
        }
    }

    public function report()
    {
        $report = $this->service->getAssetReport();
        return response()->json([
            'success' => true,
            'message' => 'Laporan aset berhasil di-generate',
            'data' => $report
        ]);
    }
}
