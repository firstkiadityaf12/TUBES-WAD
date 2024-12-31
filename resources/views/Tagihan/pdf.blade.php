<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tagihan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Daftar Tagihan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tagihan</th>
                <th>Jatuh Tempo</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Bank</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tagihans as $tagihan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tagihan->nama_tagihan }}</td>
                    <td>{{ $tagihan->tanggal_jatuh_tempo }}</td>
                    <td>Rp{{ number_format($tagihan->jumlah_tagihan, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($tagihan->status) }}</td>
                    <td>{{ $tagihan->akunBank->nama_bank ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada data tagihan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
