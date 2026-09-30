<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Invoice {{ $pembayaran->kode_pembayaran }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .success {
            color: #198754;
        }

        .danger {
            color: #dc3545;
        }

        .muted {
            color: #6c757d;
        }

        .header {
            margin-bottom: 25px;
        }

        .invoice-title {
            font-size: 28px;
            font-weight: bold;
            color: #dc3545;
        }

        .card {
            background: #f8f9fa;
            padding: 15px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .table-bordered th {
            background: #dc3545;
            color: white;
        }

        .summary td {
            padding: 8px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #dc3545;
        }

        .badge-success {
            background: #198754;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
        }

        hr {
            margin: 25px 0;
        }
    </style>


</head>

<body>


    <div class="text-center">
        <img src="{{ public_path('assets/img/ratnalisa-logo-full.png') }}" style="height:80px;">
    </div>

    <div class="text-center">
        <h2 class="success">
            PEMBAYARAN BERHASIL
        </h2>

        <p class="muted">
            Terima kasih. Pembayaran Anda telah berhasil diterima.
        </p>
    </div>

    <hr>

    <table class="header">
        <tr>
            <td width="60%">
                <h3>
                    Laboratorium Klinik Ratnalisa dan Patologi Anatomi
                </h3>

                <p>
                    Jl. Brigjend Saptadji Hadiprawira No.8A
                    <br>
                    Kota Bogor
                </p>
            </td>

            <td width="40%" class="text-end">

                <div class="invoice-title">
                    INVOICE
                </div>

                <p>
                    <strong>No Invoice :</strong>
                    {{ $pembayaran->kode_pembayaran }}
                </p>

                <p>
                    <strong>Tanggal :</strong>
                    {{ $pembayaran->created_at->format('d M Y') }}
                </p>

                <p>
                    <strong>Status :</strong>
                    LUNAS
                </p>

            </td>
        </tr>
    </table>

    <div class="card">

        <div class="section-title">
            Data Pasien
        </div>

        <table>
            <tr>
                <td width="50%">
                    Nama :
                    {{ $pembayaran->pemeriksaan->user->nama }}
                </td>

                <td width="50%">
                    Email :
                    {{ $pembayaran->pemeriksaan->user->email }}
                </td>
            </tr>

            <tr>
                <td>
                    NIK :
                    {{ $pembayaran->pemeriksaan->user->nik }}
                </td>

                <td>
                    No HP :
                    {{ $pembayaran->pemeriksaan->user->no_hp }}
                </td>
            </tr>
        </table>

    </div>

    <div class="section-title">
        Detail Pemeriksaan
    </div>

    <table class="table-bordered">

        <thead>
            <tr class="text-center">
                <th>Layanan</th>
                <th>Hari</th>
                <th>Sesi</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <tr class="text-center">

                <td>
                    {{ $pembayaran->pemeriksaan->layanan->nama_layanan }}
                </td>

                <td>
                    {{ $pembayaran->pemeriksaan->jadwal->hari }}
                </td>

                <td>

                    @switch($pembayaran->pemeriksaan->jadwal->sesi)
                        @case('Pagi')
                            07:00 - 11:00
                        @break

                        @case('Siang')
                            11:00 - 15:00
                        @break

                        @case('Sore')
                            15:00 - 18:00
                        @break

                        @case('Malam')
                            18:00 - 20:00
                        @break
                    @endswitch

                </td>

                <td>
                    Selesai
                </td>

            </tr>
        </tbody>

    </table>

    <br><br>

    <table class="summary">

        <tr>
            <td width="75%" class="text-end">
                Biaya Pemeriksaan
            </td>

            <td class="text-end">
                Rp {{ number_format($pembayaran->pemeriksaan->layanan->harga, 0, ',', '.') }}
            </td>
        </tr>

        <tr>
            <td class="text-end">
                Biaya Administrasi
            </td>

            <td class="text-end">
                Rp 2.500
            </td>
        </tr>

        <tr>
            <td class="text-end total">
                TOTAL
            </td>

            <td class="text-end total">
                Rp {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
            </td>
        </tr>

    </table>

    <hr>

    <div class="text-center muted">
        Simpan invoice ini sebagai bukti pembayaran yang sah.
    </div>


</body>

</html>
