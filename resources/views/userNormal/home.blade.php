<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/homeUser.css') }}" rel="stylesheet" />
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    @include('partials.nav')

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="justAnImage mx-auto">
                    <h1 class="topText">Campus event websites</h1>
                    <h1 class="nameText">{{ $greet }}<br>welcome back, {{ $name }}</h1>
                    <a href="{{ route('daftarevent') }}" class="daftevent-btn">Cari event sekarang</a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="quickStats mx-auto">
                    <h1 class="q-head">Quick Stats</h1>
                    <div class="flex-stats d-flex justify-content-around flex-wrap">


                        <div class="event-stats">
                            <h1 class="stats-head">Total event</h1>
                            <br>
                            <h1 class="stats-count">{{ $total_event }}</h1>
                        </div>
                        <div class="ukm-stats">
                            <h1 class="stats-head">Total Ukm</h1>
                            <br>
                            <h1 class="stats-count">{{ $total_ukm }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="eventTab mt-4">
            <!-- Event content coming soon -->
        </div>
    </div>
</body>
</html>
