<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jemaat\StoreJemaatRequest;
use App\Services\JemaatService;
use Illuminate\Http\Request;
use Exception;

class JemaatController extends Controller
{
    protected $service;

    public function __construct(JemaatService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->listJemaat($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Daftar jemaat berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(StoreJemaatRequest $request)
    {
        try {
            $jemaat = $this->service->createJemaat($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Jemaat berhasil ditambahkan',
                'data' => $jemaat
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan jemaat: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $jemaat = $this->service->getJemaat($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail jemaat ditemukan',
                'data' => $jemaat
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Jemaat tidak ditemukan'
            ], 404);
        }
    }

    public function update(StoreJemaatRequest $request, int $id) // Reusing StoreJemaatRequest or can create UpdateJemaatRequest
    {
        try {
            $jemaat = $this->service->updateJemaat($id, $request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Data jemaat berhasil diperbarui',
                'data' => $jemaat
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui jemaat: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->service->deleteJemaat($id);
            return response()->json([
                'success' => true,
                'message' => 'Jemaat berhasil dihapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus jemaat: ' . $e->getMessage()
            ], 500);
        }
    }
}
