<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\StoreKeuanganRequest;
use App\Services\KeuanganService;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    protected $service;

    public function __construct(KeuanganService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $transaksi = $this->service->listTransactions($request->all());
        $report = $this->service->getFinancialReport(
            $request->query('start_date', now()->startOfMonth()->toDateString()),
            $request->query('end_date', now()->endOfMonth()->toDateString())
        );
        return view('keuangan.index', compact('transaksi', 'report'));
    }

    public function create()
    {
        return view('keuangan.create');
    }

    public function store(StoreKeuanganRequest $request)
    {
        $this->service->recordTransaction($request->validated());
        return redirect()->route('keuangan.index')->with('success', 'Transaksi berhasil dicatat.');
    }
}
