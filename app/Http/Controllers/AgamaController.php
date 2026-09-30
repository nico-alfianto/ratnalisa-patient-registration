<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agamas = Agama::latest()->get();

        return view(
            'admin.kategori-agama.index',
            compact('agamas')
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori-agama.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_agama' => 'required|unique:agamas,nama_agama',
            ],
            [
                'nama_agama.required' => 'Nama Agama Harus Diisi',
                'nama_agama.unique' => 'Nama Agama Sudah Terdaftar.',
            ]
        );
        Agama::create([
            'nama_agama' => $request->nama_agama,
        ]);

        return redirect()
            ->route('agama.index')
            ->with('success', 'Data Agama Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agama $agama)
    {
        return view('admin.kategori-agama.edit', compact('agama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agama $agama)
    {
        $request->validate([
            'nama_agama'       => 'required',
        ]);

        // Update data layanan
        $agama->update([
            'nama_agama'       => $request->nama_agama,
        ]);

        return redirect()
            ->route('agama.index')
            ->with('successs', 'Data Agama Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Agama::destroy($id);
        return redirect()->route('agama.index')->with('error', 'Data Agama Berhasil Dihapus!');
    }
}
