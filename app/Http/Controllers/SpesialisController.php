<?php

namespace App\Http\Controllers;

use App\Models\Spesialis;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spesialis = Spesialis::latest()->get();

        return view(
            'admin.kategori-spesialis.index',
            compact('spesialis')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-spesialis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_spesialis' => 'required|unique:spesialis,nama_spesialis',
            ],
            [
                'nama_spesialis.required' => 'Nama Spesialis Harus Diisi',
                'nama_spesialis.unique' => 'Nama Spesialis Sudah Terdaftar.',
            ]
        );
        Spesialis::create([
            'nama_spesialis' => $request->nama_spesialis,
        ]);

        return redirect()
            ->route('spesialis.index')
            ->with('success', 'Data Spesialis Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spesialis $spesialis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spesialis $spesialis)
    {
        return view('admin.kategori-spesialis.edit', compact('spesialis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spesialis $spesialis)
    {
        $request->validate([
            'nama_spesialis'       => 'required',
        ]);

        // Update data layanan
        $spesialis->update([
            'nama_spesialis'       => $request->nama_spesialis,
        ]);

        return redirect()
            ->route('spesialis.index')
            ->with('successs', 'Data Spesialis Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Spesialis::destroy($id);
        return redirect()->route('spesialis.index')->with('error', 'Data Spesialis Berhasil Dihapus!');
    }
}
