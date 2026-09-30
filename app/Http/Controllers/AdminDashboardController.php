<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\Pemeriksaan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPasien = User::where('role', 'pasien')->count();
        $totalDokter = Dokter::count();
        $totalLayanan = Layanan::count();
        $totalPemeriksaan = Pemeriksaan::count();
        $menungguPembayaran = Pemeriksaan::where(
            'status',
            'Menunggu Pembayaran'
        )->count();

        $pemeriksaanSelesai = Pemeriksaan::where(
            'status',
            'Selesai'
        )->count();

        $totalPendapatan = Pembayaran::where(
            'status',
            'Selesai'
        )->sum('total_bayar');

        $latestPemeriksaan =
            Pemeriksaan::with([
                'user',
                'layanan'
            ])
            ->latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard.index',
            compact('totalPasien', 'totalDokter', 'totalLayanan', 'totalPemeriksaan', 'menungguPembayaran', 'pemeriksaanSelesai', 'totalPendapatan', 'latestPemeriksaan')
        );
    }
}
