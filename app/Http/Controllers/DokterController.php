<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Spesialis;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::latest()->get();

        return view(
            'admin.dokter.index',
            compact('dokters')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spesialis = Spesialis::all();
        return view('admin.dokter.create', compact('spesialis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'spesialis_id'    => 'required|exists:spesialis,id',
                'nama' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'pengalaman' => 'required|numeric',
            ],
            [
                'nama.required' => 'Nama Dokter Harus Diisi',
                'deskripsi.required' => 'Deskripsi Dokter Harus Diisi',
                'foto.required' => 'Foto Dokter Harus Diisi',
                'pengalaman' => 'Pengalaman Dokter Harus Diisi',
                'spesialis' => 'Spesialis Dokter Harus Diisi',
            ]

        );

        $imageName = null;
        if ($request->hasFile('foto')) {
            $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/dokters'), $imageName);
        }

        Dokter::create([
            'nama' => $request->nama,
            'spesialis_id' => $request->spesialis_id,
            'deskripsi' => $request->deskripsi,
            'foto' => $imageName,
            'pengalaman' => $request->pengalaman,
        ]);

        return redirect()
            ->route('dokter.index')
            ->with('success', 'Data Dokter Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        $spesialis = Spesialis::all();
        return view('admin.dokter.edit', compact('dokter', 'spesialis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'spesialis_id'    => 'required|exists:spesialis,id',
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'pengalaman' => 'required|numeric',
        ]);


        // Simpan nama gambar lama
        $imageName = $dokter->foto;

        // Jika upload gambar baru
        if ($request->hasFile('foto')) {

            // Hapus gambar lama
            if (
                $dokter->foto &&
                file_exists(public_path('uploads/dokters/' . $dokter->foto))
            ) {
                unlink(public_path('uploads/dokters/' . $dokter->foto));
            }

            // Upload gambar baru
            $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->move(
                public_path('uploads/dokters'),
                $imageName
            );
        }

        // Update data layanan
        $dokter->update([
            'nama' => $request->nama,
            'spesialis_id' => $request->spesialis_id,
            'deskripsi' => $request->deskripsi,
            'foto' => $imageName,
            'pengalaman' => $request->pengalaman,
        ]);

        return redirect()
            ->route('dokter.index')
            ->with('successs', 'Data Dokter Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        if ($dokter->foto && file_exists(public_path('uploads/dokters/' . $dokter->foto))) {
            unlink(public_path('uploads/dokters/' . $dokter->foto));
        }

        $dokter->delete();

        return redirect()->route('dokter.index')->with('error', 'Data Dokter Berhasil Dihapus!');
    }
}
