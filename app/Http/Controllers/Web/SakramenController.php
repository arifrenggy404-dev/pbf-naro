<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sakramen;
use App\Models\Jemaat;

class SakramenController extends Controller
{
    public function index()
    {
        $sakramen = Sakramen::with('jemaat')->latest()->paginate(15);
        return view('sakramen.index', compact('sakramen'));
    }

    public function create()
    {
        // Mengambil semua jemaat (Aktif, Pindah, atau Meninggal) agar tetap bisa dicatat sakramennya (misal sakramen kematian)
        $jemaat = Jemaat::orderBy('nama')->get();
        return view('sakramen.create', compact('jemaat'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jemaat_id' => 'required|exists:jemaat,id',
            'jenis_sakramen' => 'required|in:Baptis,Komuni,Krisma,Pernikahan,Kematian',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'pendeta_pelayan' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        Sakramen::create($data);
        return redirect()->route('sakramen.index')->with('success', 'Catatan sakramen berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        Sakramen::findOrFail($id)->delete();
        return redirect()->route('sakramen.index')->with('success', 'Catatan sakramen berhasil dihapus.');
    }
}
