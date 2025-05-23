<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Matriks Uji Bukti Pemeriksaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 1.5cm;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
            vertical-align: top;
        }

        .compact-table {
            font-size: 10px;
            table-layout: auto; /* ⬅ agar lebar kolom sesuai isi */
            word-wrap: break-word;
        }

        .compact-table th,
        .compact-table td {
            padding: 3px;
        }

        .no-border {
            border: none;
        }

        .text-center {
            text-align: center;
        }

        .signature {
            width: 100%;
            margin-top: 50px;
            text-align: right;
        }

        .signature p {
            margin: 0;
        }
    </style>
</head>
<body>

    <h2>Matriks Uji Bukti Pemeriksaan</h2>
    <br>

    <table class="no-border">
        <tr>
            <td class="no-border" style="width: 20%;">Nama Wajib Pajak</td>
            <td class="no-border">: {{ $header->nama_wajib_pajak }}</td>
        </tr>
        <tr>
            <td class="no-border">NPWP</td>
            <td class="no-border">: {{ $header->npwp }}</td>
        </tr>
        <tr>
            <td class="no-border">Tahun Pajak</td>
            <td class="no-border">: {{ $header->tahun_pajak }}</td>
        </tr>
        <tr>
            <td class="no-border">Nomor SP2</td>
            <td class="no-border">: {{ $header->nomor_sp2 }}</td>
        </tr>
    </table>

    <table class="compact-table">
        <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>Pos/Pos Turunan SPT yang diuji</th>
                <th>Temuan Pemeriksaan</th>
                <th>Jenis Bukti</th>
                <th>Dokumen Sumber</th>
                <th>Metode dan Teknik</th>
                <th>Evaluasi Bukti</th>
                <th>Kesimpulan</th>
                <th>Tindak Lanjut</th>
                <th>Catatan Tambahan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $item->posUji->nama ?? '-' }}</td>
                <td>{{ $item->temuan_pemeriksaan }}</td>
                <td>{{ $item->jenisBukti->jenis ?? '-' }}</td>
                <td>{{ $item->dokumenSumber->dokumen ?? '-' }}</td>
                <td>{{ $item->metode->metode ?? '-' }} / {{ $item->teknik->teknik ?? '-' }}</td>
                <td>{{ $item->evaluasi_bukti }}</td>
                <td>{{ $item->kesimpulan }}</td>
                <td>{{ $item->tindak_lanjut }}</td>
                <td>{{ $item->catatan_tambahan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        <br>
        <p><em>Supervisor</em></p>
        <br><br><br><br><br><br>
        <p>{{ $header->supervisor }}</p>
    </div>

</body>
</html>
