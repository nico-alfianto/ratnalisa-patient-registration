<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalLayanan;
use App\Models\Layanan;

class JadwalLayananAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = JadwalLayanan::with('layanan')
            ->latest()
            ->get();

        return view(
            'admin.jadwal-layanan.index',
            compact('jadwals')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanans = Layanan::all();
        return view('admin.jadwal-layanan.create', compact('layanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'kuota' => 'required|numeric|min:1'
        ]);

        JadwalLayanan::create([
            'layanan_id' => $request->layanan_id,
            'hari' => $request->hari,
            'sesi' => $request->sesi,
            'kuota' => $request->kuota
        ]);

        return redirect()
            ->route('jadwal-layanan.index')
            ->with(
                'success',
                'Data Jadwal Layanan Berhasil Ditambahkan!'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanans = Layanan::all();
        $jadwal_layanan = JadwalLayanan::findOrFail($id);
        return view(
            'admin.jadwal-layanan.edit',
            compact(
                'jadwal_layanan',
                'layanans'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalLayanan $jadwal_layanan)
    {
        $jadwal_layanan->update([
            'layanan_id' => $request->layanan_id,
            'hari' => $request->hari,
            'sesi' => $request->sesi,
            'kuota' => $request->kuota
        ]);

        return redirect()
            ->route('jadwal-layanan.index')
            ->with(
                'successs',
                'Data Jadwal Layanan Berhasil Diperbarui!'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalLayanan $jadwal_layanan)
    {
        $jadwal_layanan->delete();

        return redirect()
            ->route('jadwal-layanan.index')
            ->with(
                'error',
                'Data Jadwal Layanan Berhasil Dihapus!'
            );
    }
}
