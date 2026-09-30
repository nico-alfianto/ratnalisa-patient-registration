<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agama;
use App\Models\Pendidikan;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {

                return redirect()
                    ->route('admin.dashboard');
            }

            return redirect()
                ->route('dashboard_pasien');
        }

        return back()->withErrors([
            'email' => 'Email atau Password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register()
    {
        $agamas = Agama::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();
        return view('auth.register', compact('agamas', 'pendidikans', 'pekerjaans'));
    }

    public function storeRegister(Request $request)
    {
        $request->validate(
            [
                'agama_id'    => 'required|exists:agamas,id',
                'pendidikan_id'    => 'required|exists:pendidikans,id',
                'pekerjaan_id'    => 'required|exists:pekerjaans,id',
                'nik' => 'required|digits:16|unique:users,nik',
                'nama' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'no_hp' => 'required|digits_between:10,15',
                'foto_profil' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
            ],
            [
                'nik.required' => 'Nik Pasien Harus Diisi',
                'nama.required' => 'Nama Pasien Harus Diisi',
                'email.required' => 'Email Pasien Harus Diisi',
                'password.required' => 'Password Pasien Harus Diisi',
                'tempat_lahir.required' => 'Tempat Lahir Pasien Harus Diisi',
                'tanggal_lahir.required' => 'Tanggal Lahir Pasien Harus Diisi',
                'jenis_kelamin.required' => 'Jenis Kelamin Pasien Harus Diisi',
                'status.required' => 'Status Pasien Harus Diisi',
                'agama.required' => 'Agama Pasien Harus Diisi',
                'pendidikan.required' => 'Pendidikan Pasien Harus Diisi',
                'pekerjaan.required' => 'Pekerjaan Pasien Harus Diisi',
                'no_hp.required' => 'No Handphone Pasien Harus Diisi',
                'foto_profil.required' => 'Foto Pasien Harus Diisi',

            ]
        );

        $imageName = null;
        if ($request->hasFile('foto_profil')) {
            $imageName = time() . '_' . $request->file('foto_profil')->getClientOriginalName();
            $request->file('foto_profil')->move(public_path('uploads/profils'), $imageName);
        }

        User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
            'agama_id' => $request->agama_id,
            'pendidikan_id' => $request->pendidikan_id,
            'pekerjaan_id' => $request->pekerjaan_id,
            'no_hp' => $request->no_hp,
            'foto_profil' => $imageName,
            'role' => 'pasien'
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi Akun Berhasil!');
    }
}
