<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav>
        <h3 class="logo">Logo</h3>
        <ul class="listLink">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('daftarevent') }}" class="{{ request()->routeIs('daftarevent') ? 'active' : '' }}">Data event</a>
            <a href="{{ route('riwayatevent') }}" class="{{ request()->routeIs('riwayatevent') ? 'active' : '' }}">Riwayat daftar</a>
        </ul>
        <a href="{{ route('akun') }}" class="acc"><img src="{{ asset('storage/uploadPictures/' . (Auth::user()->pasfoto ?? 'default.jpg')) }}" alt="foto" width="40" class="pasFoto"></a>
    </nav>
</body>
</html>