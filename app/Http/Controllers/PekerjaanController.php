<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaans = Pekerjaan::latest()->get();

        return view(
            'admin.kategori-pekerjaan.index',
            compact('pekerjaans')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_pekerjaan' => 'required|unique:pekerjaans,nama_pekerjaan',
            ],
            [
                'nama_pekerjaan.required' => 'Nama Pekerjaan Harus Diisi',
                'nama_pekerjaan.unique' => 'Nama Pekerjaan Sudah Terdaftar.',
            ]
        );
        Pekerjaan::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
        ]);

        return redirect()
            ->route('pekerjaan.index')
            ->with('success', 'Data Pekerjaan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('admin.kategori-pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'nama_pekerjaan'       => 'required',
        ]);

        // Update data layanan
        $pekerjaan->update([
            'nama_pekerjaan'       => $request->nama_pekerjaan,
        ]);

        return redirect()
            ->route('pekerjaan.index')
            ->with('successs', 'Data Pekerjaan Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pekerjaan::destroy($id);
        return redirect()->route('pekerjaan.index')->with('error', 'Data Pekerjaan Berhasil Dihapus!');
    }
}
