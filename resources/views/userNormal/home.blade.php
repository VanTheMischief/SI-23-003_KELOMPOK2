<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="{{ asset('css/homeUser.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        @include('partials.nav')
        <div class="justAnImage">
            <h1 class="nameText">
                {{ $greet }}<br>
                Welcome Back, {{ $name }}
            </h1>
        </div>
        <div class="eventTab">
            <div class="BiggestEvent">
                <h1 class="bigEventHead">
                    Event terbesar Saat Ini
                </h1>
                <a href="{{ route('daftarevent') }}" class="bigEventMore">Lihat Selengkapnya</a>
            </div>
        </div>
    </body>
</html>
