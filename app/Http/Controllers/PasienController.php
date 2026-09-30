<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\Agama;
use App\Models\Pendidikan;
use App\Models\Pekerjaan;
use App\Models\Layanan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PasienController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $totalPemeriksaan = Pemeriksaan::where(
            'user_id',
            $user->id
        )->count();

        $pending = Pemeriksaan::where(
            'user_id',
            $user->id
        )->where(
            'status',
            'pending'
        )->count();

        $selesai = Pemeriksaan::where(
            'user_id',
            $user->id
        )->where(
            'status',
            'selesai'
        )->count();

        return view(
            'pasien.dashboard',
            compact(
                'user',
                'totalPemeriksaan',
                'pending',
                'selesai',
            )
        );
    }

    public function profil()
    {
        $user = auth()->user();
        $agamas = Agama::all();
        $pendidikans = Pendidikan::all();
        $pekerjaans = Pekerjaan::all();

        return view(
            'pasien.profil',
            compact('user', 'agamas', 'pendidikans', 'pekerjaans')
        );
    }

    public function updateProfil(Request $request)
    {
        $user = \App\Models\User::findOrFail(Auth::id());

        $request->validate([
            'agama_id'    => 'required|exists:agamas,id',
            'pendidikan_id' => 'required|exists:pendidikans,id',
            'pekerjaan_id' => 'required|exists:pekerjaans,id',

            'nik' => [
                'required',
                'digits:16',
                Rule::unique('users', 'nik')->ignore($user->id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
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

        $user->update([
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


        return redirect()->route('profil')->with('success', 'Data Pasien Berhasil Diperbarui!');
    }

    public function pemeriksaan()
    {
        $pemeriksaans = Pemeriksaan::with([
            'layanan',
            'jadwal',
            'pembayaran'
        ])
            ->where('user_id', auth()->id())
            ->whereHas('pembayaran', function ($q) {

                $q->where(
                    'status',
                    'Menunggu Pembayaran'
                );
            })
            ->latest()
            ->get();

        $totalPemeriksaan = $pemeriksaans->count();

        $menungguPembayaran = $pemeriksaans->count();

        return view(
            'pasien.pemeriksaan',
            compact(
                'pemeriksaans',
                'totalPemeriksaan',
                'menungguPembayaran'
            )
        );
    }

    public function invoice()
    {
        $pembayarans = Pembayaran::with([
            'pemeriksaan.layanan'
        ])
            ->where(
                'status',
                'Selesai'
            )
            ->whereHas(
                'pemeriksaan',
                function ($q) {

                    $q->where(
                        'user_id',
                        auth()->id()
                    );
                }
            )
            ->latest()
            ->get();

        return view(
            'pasien.invoice',
            compact('pembayarans')
        );
    }

    public function detailInvoice($id)
    {
        $pembayaran = Pembayaran::with([
            'pemeriksaan.user',
            'pemeriksaan.layanan',
            'pemeriksaan.jadwal'
        ])
            ->where('status', 'Selesai')
            ->findOrFail($id);

        if ($pembayaran->pemeriksaan->user_id != auth()->id()) {
            abort(403);
        }

        return view(
            'pasien.invoice-detail',
            compact('pembayaran')
        );
    }

    public function downloadInvoice($id)
    {
        $pembayaran = Pembayaran::with([
            'pemeriksaan.user',
            'pemeriksaan.layanan',
            'pemeriksaan.jadwal'
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'pasien.invoice-pdf',
            compact('pembayaran')
        );

        return $pdf->download(
            'Invoice-' .
                $pembayaran->kode_pembayaran .
                '.pdf'
        );
    }
}
