<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $nav ?? 'Aplikasi Pemasukan' }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #000000; 
            color: #000000; 
        }
        .custom-container {
            background-color: white; 
            border-radius: 15px;
            padding: 40px;
            margin-top: 20px;
        }
        .sidebar {
            background-color: purple; 
            color: #ffffff;
            border-radius: 12px;
            height: 100vh; 
            padding: 20px;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            margin-top: 10px;
        }
        .sidebar a:hover {
            text-decoration: underline;
            color: #ffc107;
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
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h4>BUKU SISTA</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pemasukan.index') }}"><i class="fas fa-dollar-sign"></i> Pemasukan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> Tentang</a>
                </li>
            </ul>
        </div>
        <div class="container custom-container flex-grow-1">
            <h2 class="text-center mb-4">{{ $nav ?? 'Dashboard' }}</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
