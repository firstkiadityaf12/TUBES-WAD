<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Sista - UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #563d7c;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .product-card img {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .footer {
            background-color: #563d7c;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Buku Sista</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Selamat Datang di Buku Sista</h1>
        <p class="text-center mb-5">Aplikais UMKM yang menyediakan buku berkualitas untuk kebutuhan Anda. Dapatkan buku terbaik dengan harga terjangkau!</p>

        <!-- Products Section -->
        <div class="row">
            @foreach($akun_banks as $bank)
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    <img src="{{ $bank->image }}" alt="{{ $bank->title }}" class="img-fluid">
                    <div class="p-3">
                        <h5>{{ $bank->title }}</h5>
                        <p class="text-muted">{{ $bank->author }}</p>
                        <p><strong>Rp {{ number_format($bank->price, 0, ',', '.') }}</strong></p>
                        <a href="/book/{{ $bank->id }}" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Buku Sista. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
