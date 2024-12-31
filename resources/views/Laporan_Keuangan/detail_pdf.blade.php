<!DOCTYPE html>
<html>
<head>
    <title>Laporan Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Detail</h1>
    <p><strong>Periode:</strong> {{ $laporan->periode_laporan }}</p>
    <p><strong>Total Pemasukan:</strong> Rp{{ number_format($laporan->total_pemasukan, 0, ',', '.') }}</p>
    <p><strong>Total Pengeluaran:</strong> Rp{{ number_format($laporan->total_pengeluaran, 0, ',', '.') }}</p>
    <p><strong>Saldo Akhir:</strong> Rp{{ number_format($laporan->saldo_akhir, 0, ',', '.') }}</p>
    <p><strong>Catatan:</strong> {{ $laporan->catatan }}</p>

    <h2>Pemasukan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Pengeluaran</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluaran as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
