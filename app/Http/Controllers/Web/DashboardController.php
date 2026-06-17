<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use App\Models\Keuangan;
use App\Models\JadwalPelayanan;
use App\Models\Inventaris;
use App\Models\Sakramen;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $stats = [];

        if ($user->isAdmin()) {
            $stats['total_jemaat'] = Jemaat::count();
            $stats['total_sakramen'] = Sakramen::count();
            $stats['total_inventaris'] = Inventaris::count();
            $stats['latest_jemaat'] = Jemaat::latest()->take(5)->get();
        }

        if ($user->isKoordinator()) {
            $stats['jadwal_minggu_ini'] = JadwalPelayanan::whereBetween('waktu_mulai', [now(), now()->addDays(7)])->count();
            $stats['upcoming_jadwal'] = JadwalPelayanan::where('waktu_mulai', '>=', now())->orderBy('waktu_mulai')->take(5)->get();
        }

        if ($user->isBendahara()) {
            $pemasukan = Keuangan::where('tipe', 'Pemasukan')->sum('jumlah');
            $pengeluaran = Keuangan::where('tipe', 'Pengeluaran')->sum('jumlah');
            $stats['saldo'] = $pemasukan - $pengeluaran;
            $stats['latest_transaksi'] = Keuangan::latest()->take(5)->get();
        }

        return view('dashboard', compact('stats'));
    }
}
