<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jemaat\StoreJemaatRequest;
use App\Services\JemaatService;
use Illuminate\Http\Request;

class JemaatController extends Controller
{
    protected $service;

    public function __construct(JemaatService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $jemaat = $this->service->listJemaat($request->all());
        return view('jemaat.index', compact('jemaat'));
    }

    public function create()
    {
        return view('jemaat.create');
    }

    public function store(StoreJemaatRequest $request)
    {
        $this->service->createJemaat($request->validated());
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jemaat = $this->service->getJemaat($id);
        return view('jemaat.edit', compact('jemaat'));
    }

    public function update(StoreJemaatRequest $request, $id)
    {
        $this->service->updateJemaat($id, $request->validated());
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->service->deleteJemaat($id);
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus.');
    }
}
