<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Pendidikan;
use App\Models\Pekerjaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class PasienAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'pasien')->get();
        $agamas = Agama::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();


        return view('admin.pasien.index', compact('users', 'agamas', 'pendidikans', 'pekerjaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        $agamas = Agama::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();

        return view('admin.pasien.show', compact('users', 'agamas', 'pendidikans', 'pekerjaans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        $agamas = Agama::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();

        return view(
            'admin.pasien.edit',
            compact('users', 'agamas', 'pendidikans', 'pekerjaans')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);

        $request->validate([
            'agama_id'    => 'required|exists:agamas,id',
            'pendidikan_id' => 'required|exists:pendidikans,id',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',

            'nik' => [
                'required',
                'digits:16',
                Rule::unique('users', 'nik')->ignore($users->id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($users->id),
            ],

            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'no_hp' => 'required|digits_between:10,15',
        ], [
            'nik.required' => 'Nik Pasien Harus Diisi',
            'nama.required' => 'Nama Pasien Harus Diisi',
            'email.required' => 'Email Pasien Harus Diisi',
            'tempat_lahir.required' => 'Tempat Lahir Pasien Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Pasien Harus Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Pasien Harus Diisi',
            'status.required' => 'Status Pasien Harus Diisi',
            'agama_id.required' => 'Agama Pasien Harus Diisi',
            'pendidikan_id.required' => 'Pendidikan Pasien Harus Diisi',
            'pekerjaan_id.required' => 'Pekerjaan Pasien Harus Diisi',
            'no_hp.required' => 'No Handphone Pasien Harus Diisi',
        ]);

        $users->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
            'agama_id' => $request->agama_id,
            'pendidikan_id' => $request->pendidikan_id,
            'pekerjaan_id' => $request->pekerjaan_id,
            'no_hp' => $request->no_hp,
            'role' => 'pasien'
        ]);


        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        if ($users->foto_profil && file_exists(public_path('uploads/profils/' . $users->foto_profil))) {
            unlink(public_path('uploads/profils/' . $users->foto_profil));
        }

        $users->delete();

        return redirect()->route('pasien.index')->with('error', 'Data Pasien berhasil dihapus!');
    }
}
