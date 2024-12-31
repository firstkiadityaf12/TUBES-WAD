<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Laporan Keuangan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Saldo Akhir</th>
                <th>Catatan</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->periode_laporan }}</td>
                <td>{{ 'Rp' . number_format($item->total_pemasukan, 0, ',', '.') }}</td>
                <td>{{ 'Rp' . number_format($item->total_pengeluaran, 0, ',', '.') }}</td>
                <td>{{ 'Rp' . number_format($item->saldo_akhir, 0, ',', '.') }}</td>
                <td>{{ $item->catatan ?? '-' }}</td>
                <td>{{ $item->tanggal_pembuatan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
