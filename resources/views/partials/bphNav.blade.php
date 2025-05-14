<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <h3 class="logo">Logo</h3>
        <ul class="listLink">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('daftarevent') }}" class="{{ request()->routeIs('daftarevent') ? 'active' : '' }}">Daftar Event</a>
            <a href="{{ route('daftarukm') }}" class="{{ request()->routeIs('daftarukm') ? 'active' : '' }}">Daftar UKM</a>
        </ul>
        <a href="{{ route('akun') }}" class="acc"><img src="{{ asset('storage/uploadPictures/' . (Auth::user()->pasfoto ?? 'default.jpg'))  }}" class="pasFoto" alt=""></a>
    </nav>
</body>
</html>