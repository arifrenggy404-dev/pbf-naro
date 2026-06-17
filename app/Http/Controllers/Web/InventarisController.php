<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventaris\StoreInventarisRequest;
use App\Services\InventarisService;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    protected $service;

    public function __construct(InventarisService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $items = $this->service->listItems($request->all());
        $summary = $this->service->getAssetReport();
        return view('inventaris.index', compact('items', 'summary'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(StoreInventarisRequest $request)
    {
        $this->service->createItem($request->validated());
        return redirect()->route('inventaris.index')->with('success', 'Barang inventaris berhasil ditambahkan.');
    }
}
