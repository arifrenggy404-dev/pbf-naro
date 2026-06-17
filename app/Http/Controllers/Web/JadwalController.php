<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jadwal\StoreJadwalRequest;
use App\Services\JadwalService;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    protected $service;

    public function __construct(JadwalService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $jadwal = $this->service->listSchedules($request->all());
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $jemaat = \App\Models\Jemaat::where('status_anggota', 'Aktif')->get();
        return view('jadwal.create', compact('jemaat'));
    }

    public function store(StoreJadwalRequest $request)
    {
        $this->service->createSchedule($request->validated());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal pelayanan berhasil dibuat.');
    }
}
