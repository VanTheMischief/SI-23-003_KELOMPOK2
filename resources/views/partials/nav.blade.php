<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white px-4 py-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/TelU.png') }}" class="logo" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarLinks">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('daftarevent') ? 'active' : '' }}" href="{{ route('daftarevent') }}">Data Event</a>
                    <a class="nav-link {{ request()->routeIs('riwayatevent') ? 'active' : '' }}" href="{{ route('riwayatevent') }}">Riwayat Daftar</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('akun') }}" class="acc">
                        <img src="{{ asset('storage/uploadPictures/' . (Auth::user()->pasfoto ?? 'default.jpg')) }}" alt="foto" class="pasFoto">
                    </a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>
