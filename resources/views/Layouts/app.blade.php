<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $nav ?? 'BUKU SISTA' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
        }
        
        .title-black {
        color: black;
        }

        .custom-container {
            background-color: white;
            border-radius: 15px;
            padding: 40px;
            margin-top: 7px;
            margin-right: 7px;
            height: 150vh;
        }
        .sidebar {
            background-color: purple; 
            background-color: red;
            margin: 7px;
            color: #ffffff;
            border-radius: 12px;
            height: 150vh;
            width: 250px;
            padding: 5px;
            position: sticky;
            top: 0;
        }
        .sidebar h4 {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            margin-top: 10px;
            display: block;
            padding: 10px;
            border-radius: 8px;
        }
        .sidebar a:hover {
            background-color: #ffc107;
            color: #000000;
            text-decoration: none;
        }
        .custom-card {
            transition: transform 0.5s;
            border: 1px solid #000000;
        }
        .custom-card:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(255,255,255,0.25);
        }
        .btn-primary {
            background-color: red;
            border-color: red;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        footer {
            background-color: #000000;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @auth
        <div class="sidebar">
            <h4>BUKU SISTA</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pemasukan.index') }}"><i class="fas fa-dollar-sign"></i> Pemasukan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengeluaran.index') }}"><i class="fas fa-credit-card"></i> Pengeluaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transactions.index') }}"><i class="fas fa-credit-card"></i> Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bankaccounts.index') }}"><i class="fas fa-credit-card"></i> Akun Bank</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tagihan.index') }}"><i class="fas fa-credit-card"></i> Tagihan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('laporan_keuangan.index') }}"><i class="fas fa-credit-card"></i> Laporan Keuangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        @endauth

        @guest
        <div class="sidebar">
            <h4>BUKU SISTA</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
                </li>
            </ul>
        </div>
        @endguest


        <!-- Main Content -->
        <div class="container custom-container flex-grow-1">
            <h2 class="text-center mb-4">{{ $nav ?? 'Dashboard' }}</h2>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Dynamic Content -->
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Buku Sista. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
