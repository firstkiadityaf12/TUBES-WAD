<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('landing-page/styles.css') }}">
    <title>BUKU SISTA</title>
</head>
<body>
    <nav>
        <div class="nav__logo">BUKUSISTA<span>.</span></div>
        <button class="btn">Login</button>
    </nav>
    <header>
        <div class="section__container header__container">
            <div class="header__image">
                <img src="{{ asset('landing-page/images/header-1.jpg') }}" alt="header" />
                <img src="{{ asset('landing-page/images/header-2.jpg') }}" alt="header" />
            </div>
            <div class="header__content">
                <div>
                    <p class="sub__header">Buku Sista</p>
                    <h1>Dashboard 😊<br />Catatan Keuangan UMKM</h1>
                    <p class="section__subtitle">
                    Aplikasi Buku Sista membantu Anda mengelola dan mencatat keuangan usaha kecil Anda dengan mudah. 
                    Dapatkan laporan keuangan yang jelas dan dukungan untuk pertumbuhan bisnis Anda.
                    </p>
                    <div class="action__btns">
                        <button class="btn">Mulai Sekarang</button>
                        <div class="story">
                            <div class="video__image">
                                <img src="{{ asset('landing-page/images/story.jpg') }}" alt="story" />
                                <span><i class="ri-play-fill"></i></span>
                            </div>
                            <span>Pelajari lebih lanjut</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="section__container destination__container">
        <div class="section__header">
            <div>
                <h2 class="section__title">Kelebihan Buku Sista</h2>
                <p class="section__subtitle">
                    Temukan fitur-fitur unggulan yang akan membantu Anda dalam pencatatan keuangan UMKM dengan mudah dan efisien.
                </p>
            </div>
            <div class="destination__nav">
                <span><i class="ri-arrow-left-s-line"></i></span>
                <span><i class="ri-arrow-right-s-line"></i></span>
            </div>
        </div>
        <div class="destination__grid">
            <div class="destination__card">
                <img src="{{ asset('landing-page/images/destination-1.jpg') }}" alt="destination" />
                <div class="destination__details">
                    <p class="destination__title">Laporan Keuangan</p>
                    <p class="destination__subtitle">Dapatkan laporan keuangan yang jelas dan terperinci secara otomatis.</p>
                </div>
            </div>
            <div class="destination__card">
                <img src="{{ asset('landing-page/images/destination-2.jpg') }}" alt="destination" />
                <div class="destination__details">
                    <p class="destination__title">Analisis Keuangan</p>
                    <p class="destination__subtitle">Analisis keuangan yang membantu Anda membuat keputusan yang lebih baik.</p>
                </div>
            </div>
            <div class="destination__card">
                <img src="{{ asset('landing-page/images/destination-3.jpg') }}" alt="destination" />
                <div class="destination__details">
                    <p class="destination__title">Kemudahan Akses</p>
                    <p class="destination__subtitle">Akses data keuangan Anda kapan saja dan di mana saja.</p>
                </div>
            </div>
            <div class="destination__card">
                <img src="{{ asset('landing-page/images/destination-4.jpg') }}" alt="destination" />
                <div class="destination__details">
                    <p class="destination__title">Dukungan Pelanggan</p>
                    <p class="destination__subtitle">Dapatkan dukungan pelanggan yang responsif dan siap membantu Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <h3>BUKUSISTA<span>.</span></h3>
                <p>
                    Temukan fitur-fitur unggulan yang akan membantu Anda dalam pencatatan keuangan UMKM dengan mudah dan efisien.
                </p>
            </div>
            <div class="footer__col">
                <h4>Support</h4>
                <p>FAQs</p>
                <p>Terms & Conditions</p>
                <p>Privacy Policy</p>
                <p>Contact Us</p>
            </div>
            <div class="footer__col">
                <h4>Address</h4>
                <p>
                    <span>Address:</span> 280 Wilson Street, Cima, California, 92323, United States
                </p>
                <p><span>Email:</span> info@pathway.com</p>
                <p><span>Phone:</span> +91 9876543210</p>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024
        </div>
    </footer>
</body>
</html>
