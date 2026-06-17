<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jadwal\StoreJadwalRequest;
use App\Services\JadwalService;
use Illuminate\Http\Request;
use Exception;

class JadwalController extends Controller
{
    protected $service;

    public function __construct(JadwalService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->listSchedules($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Daftar jadwal berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(StoreJadwalRequest $request)
    {
        try {
            $jadwal = $this->service->createSchedule($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Jadwal pelayanan berhasil dibuat',
                'data' => $jadwal
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat jadwal: ' . $e->getMessage()
            ], 500);
        }
    }
}
