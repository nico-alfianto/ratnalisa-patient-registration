<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikans = Pendidikan::latest()->get();

        return view(
            'admin.kategori-pendidikan.index',
            compact('pendidikans')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_pendidikan' => 'required|unique:pendidikans,nama_pendidikan',
            ],
            [
                'nama_pendidikan.required' => 'Nama Pendidikan Harus Diisi',
                'nama_pendidikan.unique' => 'Nama Pendidikan Sudah Terdaftar.',
            ]
        );
        Pendidikan::create([
            'nama_pendidikan' => $request->nama_pendidikan,
        ]);

        return redirect()
            ->route('pendidikan.index')
            ->with('success', 'Data Pendidikan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendidikan $pendidikan)
    {
        return view('admin.kategori-pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        $request->validate([
            'nama_pendidikan'       => 'required',
        ]);

        // Update data layanan
        $pendidikan->update([
            'nama_pendidikan'       => $request->nama_pendidikan,
        ]);

        return redirect()
            ->route('pendidikan.index')
            ->with('successs', 'Data Pendidikan Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pendidikan::destroy($id);
        return redirect()->route('pendidikan.index')->with('error', 'Data Pendidikan Berhasil Dihapus!');
    }
}
