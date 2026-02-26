<!DOCTYPE html>
<html>

<head>
    <title>Laporan Mutasi Aset</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #333;
        }

        th {
            background-color: #f2f2f2;
            padding: 10px;
        }

        td {
            padding: 8px;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>LAPORAN DATA MUTASI ASET</h2>
        <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Asset</th>
                <th>Nama Aset</th>
                <th>Dari</th>
                <th>Ke</th>
                <th>Tanggal</th>
                <th>Petugas</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasi as $index => $mutasi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $mutasi->aset->kode_aset }}</td>
                <td>{{ $mutasi->aset->nama_aset ?? '-' }}</td>
                <td><span class="badge bg-primary text-white">{{ $mutasi->lokasiAsal->nama_lokasi ?? '-' }}</span></td>
                <td><span class="badge bg-success text-white">{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}</span>
                </td>
                <td>{{ $mutasi->tanggal_mutasi ?? '-' }}</td>
                <td>{{ $mutasi->user->name ?? '-' }}</td>
                <td>{{ $mutasi->keterangan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>Dicetak oleh: {{ auth()->user()->name ?? 'Admin' }}</p>
    </div>
</body>
</html>