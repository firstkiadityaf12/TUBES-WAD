<!DOCTYPE html>
<html>
<head>
    <title>Data Akun Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Data Akun Bank</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Nama Pemilik</th>
                <th>Saldo</th>
                <th>Tanggal Ditambah</th>
                <th>Tanggal Diubah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bankaccounts as $bankaccount)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bankaccount->nama_bank }}</td>
                <td>{{ $bankaccount->nomor_rekening }}</td>
                <td>{{ $bankaccount->nama_pemilik }}</td>
                <td>Rp{{ number_format($bankaccount->saldo, 0, ',', '.') }}</td>
                <td>{{ $bankaccount->tanggal_ditambahkan }}</td>
                <td>{{ $bankaccount->tanggal_diubah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>