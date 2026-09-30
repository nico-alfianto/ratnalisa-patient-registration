<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::latest()->get();

        return view(
            'admin.layanan.index',
            compact('layanans')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_layanan' => 'required',
                'harga' => 'required|numeric',
                'deskripsi' => 'required',
                'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'deskripsi_singkat' => 'required',
                'deskripsi_lengkap' => 'required',
                'status'             => 'required',
            ],
            [
                'nama_layanan.required' => 'Nama Layanan Harus Diisi',
                'harga.required' => 'Harga Layanan Harus Diisi',
                'gambar.required' => 'Gambar Layanan Harus Diisi',
                'deskripsi' => 'Deskripsi Layanan Harus Diisi',
                'deskripsi_singkat' => 'Deskripsi Singkat Layanan Harus Diisi',
                'deskripsi_lengkap' => 'Deskripsi Lengkap Harus Diisi',
                'status' => 'Status Harus Diisi',
            ]

        );

        // Generate slug otomatis
        $slug = Str::slug($request->nama_layanan);

        // Upload gambar
        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/layanans'), $imageName);
        }

        $data = Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'slug' => Str::slug($request->nama_layanan),
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi_lengkap' => $request->deskripsi_lengkap,
            'status' => $request->status,
        ]);


        return redirect()
            ->route('layanan.index')
            ->with('success', 'Data Layanan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan'       => 'required',
            'deskripsi'          => 'required',
            'harga'              => 'required|numeric',
            'deskripsi_singkat'  => 'required',
            'deskripsi_lengkap'  => 'required',
            'status'             => 'required',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        // Generate slug baru dari nama layanan
        $slug = Str::slug($request->nama_layanan);

        // Simpan nama gambar lama
        $imageName = $layanan->gambar;

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if (
                $layanan->gambar &&
                file_exists(public_path('uploads/layanans/' . $layanan->gambar))
            ) {
                unlink(public_path('uploads/layanans/' . $layanan->gambar));
            }

            // Upload gambar baru
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

            $request->file('gambar')->move(
                public_path('uploads/layanans'),
                $imageName
            );
        }

        // Update data layanan
        $layanan->update([
            'slug'               => $slug,
            'nama_layanan'       => $request->nama_layanan,
            'deskripsi'          => $request->deskripsi,
            'harga'              => $request->harga,
            'gambar'             => $imageName,
            'deskripsi_singkat'  => $request->deskripsi_singkat,
            'deskripsi_lengkap'  => $request->deskripsi_lengkap,
            'status'             => $request->status,
        ]);

        return redirect()
            ->route('layanan.index')
            ->with('successs', 'Data Layanan Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        if ($layanan->gambar && file_exists(public_path('uploads/layanans/' . $layanan->gambar))) {
            unlink(public_path('uploads/layanans/' . $layanan->gambar));
        }

        $layanan->delete();

        return redirect()->route('layanan.index')->with('error', 'Data Layanan Berhasil Dihapus!');
    }
}
