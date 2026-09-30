<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\Invoice;
use App\Models\Pemeriksaan;
use App\Models\Pembayaran;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalLayanan;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\User;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda.index');
    }

    public function tentang()
    {
        return view('tentang.index');
    }

    public function kontak()
    {
        return view('kontak.index');
    }

    public function layanan()
    {
        $layanans = Layanan::where('status', true)->get();
        return view('layanan.index', compact('layanans'));
    }

    public function detail_layanan($slug)
    {
        $layanans = Layanan::where('slug', $slug)->firstOrFail();
        $relatedLayanan = Layanan::where('id', '!=', $layanans->id)
            ->where('status', 'aktif')
            ->take(3)
            ->get();
        return view('layanan.detail', compact('layanans', 'relatedLayanan'));
    }


    public function privacy()
    {
        return view('privacy.index');
    }

    public function terms()
    {
        return view('terms.index');
    }

    public function daftar($slug)
    {
        $layanan = Layanan::with('jadwals')
            ->where('slug', $slug)
            ->firstOrFail();

        $user = auth()->user();

        return view(
            'layanan.daftar',
            compact(
                'layanan',
                'user'
            )
        );
    }

    public function storePemeriksaan(Request $request)
    {

        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'jadwal_layanan_id' => 'required|exists:jadwal_layanans,id',

            'alamat' => 'required',
            'kelurahan' => 'required',
            'kota' => 'required',
            'negara' => 'required',

            'catatan' => 'nullable|string',
        ]);

        $jadwal = JadwalLayanan::findOrFail(
            $request->jadwal_layanan_id
        );

        $terisi = $jadwal->pemeriksaans()->count();

        if ($terisi >= $jadwal->kuota) {

            return back()->with(
                'error',
                'Kuota Jadwal Sudah Penuh'
            );
        }

        $noRegistrasi =
            'REG-' .
            date('Ymd') .
            '-' .
            strtoupper(Str::random(5));

        $pemeriksaan =   Pemeriksaan::create([

            'user_id' => Auth::id(),

            'layanan_id' =>
            $request->layanan_id,

            'jadwal_layanan_id' =>
            $request->jadwal_layanan_id,

            'no_registrasi' =>
            $noRegistrasi,

            'alamat' =>
            $request->alamat,

            'kelurahan' =>
            $request->kelurahan,

            'kota' =>
            $request->kota,

            'negara' =>
            $request->negara,

            'catatan' =>
            $request->catatan,

            'status' => 'Menunggu Pembayaran',
        ]);

        Pembayaran::create([

            'pemeriksaan_id' => $pemeriksaan->id,

            'kode_pembayaran' =>
            'INV-' .
                date('Ymd') .
                '-' .
                strtoupper(Str::random(5)),

            'total_bayar' =>
            $pemeriksaan->layanan->harga + 2500,

            'metode_pembayaran' =>
            null,

            'status' =>
            'Menunggu Pembayaran',

            'expired_at' =>
            now()->addDay()

        ]);

        return redirect()
            ->route('pembayaran', $pemeriksaan->id)
            ->with(
                'success',
                'Pendaftaran Layanan Berhasil Dibuat!'
            );
    }

    public function daftar_edit($id)
    {
        $pemeriksaan = Pemeriksaan::with([
            'user',
            'layanan',
            'jadwal'
        ])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $jadwals = JadwalLayanan::where(
            'layanan_id',
            $pemeriksaan->layanan_id
        )->get();

        return view(
            'layanan.edit',
            compact(
                'pemeriksaan',
                'jadwals'
            )
        );
    }

    public function updatePemeriksaan(
        Request $request,
        $id
    ) {

        $pemeriksaan = Pemeriksaan::where(
            'user_id',
            auth()->id()
        )->findOrFail($id);

        if (
            $pemeriksaan->status == 'Selesai'
        ) {

            return back()->with(
                'error',
                'Pemeriksaan yang sudah selesai tidak dapat diedit.'
            );
        }

        $request->validate([

            'jadwal_layanan_id' =>
            'required|exists:jadwal_layanans,id',

            'alamat' =>
            'required',

            'kelurahan' =>
            'required',

            'kota' =>
            'required',

            'negara' =>
            'required',

            'catatan' =>
            'nullable'

        ]);

        $pemeriksaan->update([

            'jadwal_layanan_id' =>
            $request->jadwal_layanan_id,

            'alamat' =>
            $request->alamat,

            'kelurahan' =>
            $request->kelurahan,

            'kota' =>
            $request->kota,

            'negara' =>
            $request->negara,

            'catatan' =>
            $request->catatan

        ]);

        return redirect()
            ->route('pemeriksaan')
            ->with(
                'success',
                'Data Pendaftaran Pemeriksaan Berhasil Diperbarui!'
            );
    }


    public function before_pembayaran($id)
    {
        $pemeriksaan = Pemeriksaan::with([
            'user',
            'layanan',
            'jadwal',
            'pembayaran'
        ])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        if (!$pemeriksaan->pembayaran->snap_token) {

            $params = [

                'transaction_details' => [

                    'order_id' =>
                    $pemeriksaan->pembayaran->kode_pembayaran,

                    'gross_amount' =>
                    $pemeriksaan->pembayaran->total_bayar

                ],

                'customer_details' => [

                    'first_name' =>
                    $pemeriksaan->user->nama,

                    'email' =>
                    $pemeriksaan->user->email,

                    'phone' =>
                    $pemeriksaan->user->no_hp

                ]
            ];

            $snapToken =
                Snap::getSnapToken($params);

            $pemeriksaan
                ->pembayaran
                ->update([
                    'snap_token' => $snapToken
                ]);
        }

        return view(
            'pembayaran.index',
            compact('pemeriksaan')
        );
    }

    public function paymentSuccess($id)
    {
        $pemeriksaan = Pemeriksaan::with(
            'pembayaran'
        )->findOrFail($id);

        $pemeriksaan->pembayaran->update([

            'status' => 'Selesai'

        ]);

        $pemeriksaan->update([

            'status' => 'Selesai'

        ]);

        Invoice::firstOrCreate(

            [
                'pemeriksaan_id' => $pemeriksaan->id
            ],

            [
                'nomor_invoice' =>
                'INV-' .
                    date('Ymd') .
                    '-' .
                    strtoupper(Str::random(5)),

                'tanggal_invoice' =>
                now(),

                'total_tagihan' =>
                $pemeriksaan->pembayaran->total_bayar,

                'status' =>
                'Selesai'
            ]
        );

        return redirect()
            ->route('invoice')
            ->with(
                'success',
                'Pembayaran Pendaftaran Pemeriksaan Berhasil'
            );
    }

    // public function midtransCallback()
    // {

    //     $notification =
    //         new Notification();

    //     $orderId =
    //         $notification->order_id;

    //     $transactionStatus =
    //         $notification->transaction_status;

    //     $payment = Pembayaran::where(
    //         'kode_pembayaran',
    //         $orderId
    //     )->first();

    //     if (!$payment) {
    //         return response()->json([
    //             'message' => 'Payment not found'
    //         ]);
    //     }

    //     if (
    //         $transactionStatus == 'settlement'
    //         ||
    //         $transactionStatus == 'capture'
    //     ) {

    //         $payment->update([
    //             'status' => 'Lunas'
    //         ]);

    //         $payment->pemeriksaan->update([
    //             'status' => 'Selesai'
    //         ]);
    //     }

    //     return response()->json([
    //         'success' => true
    //     ]);
    // }

    public function dokter()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }


    // Kategori Layanan

    public function hematologi()
    {
        return view('kategori-layanan.hematologi');
    }
}
