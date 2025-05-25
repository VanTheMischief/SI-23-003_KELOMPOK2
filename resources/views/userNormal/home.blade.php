<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="{{ asset('css/homeUser.css') }}" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="justAnImage">
            @include('partials.nav')
            <h1 class="topText">
                Campus event websites
            </h1>
            <h1 class="nameText">
                {{ $greet }}<br>
                Welcome Back, {{ $name }}
            </h1>
        </div>
        <div class="quickStats">
            <h1 class="q-head">Quick Stats</h1>
            <div class="flex-stats">
                <div class="event-stats">
                    <h1 class="stats-head">
                        Total event
                    </h1><br>
                    <h1 class="stats-count">
                        {{ $total_event }}
                    </h1>
                </div>
                <div class="ukm-stats">
                    <h1 class="stats-head">
                        Total Ukm
                    </h1><br>
                    <h1 class="stats-count">
                        {{ $total_ukm }}
                    </h1>
                </div>
            </div>
            <div class="line-stats">
            
            </div>
        </div>
        <div class="eventTab">
                <h1 class="bigEventHead">
                    Event terbesar Saat Ini
                </h1>
                <a href="{{ route('daftarevent') }}" class="bigEventMore">Lihat Selengkapnya</a>
        </div>
    </body>
</html>
