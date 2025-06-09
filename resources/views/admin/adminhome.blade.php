<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/homeAdmin.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    @include('partials.adminNav')
   <form action="{{ route('logout-admin') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="logout-btn"><span>Logout</span></button>
    </form>


    <div class="headers">
        <img src="{{ asset('storage/uploadPictures/' . (Auth::user()->pasfoto ?? 'default.jpg')) }}" class="foto-admin">
        <h1 class="head-text">
            {{ $greet }}, {{ $name }}
        </h1>
    </div>
    <div class="count">
        <div class="info-count">
            <h1 class="count-head">
                Ukm's And Event's Count
            </h1>
            <p class="count-text">
                Graph ini menggambarkan jumlah Ukm, dan Event yang terdaftar di web ini
            </p>
        </div>
        <div class="graph">
            <canvas id="dashboardChart" width="400" height="200"></canvas>

            <script>
                const ctx = document.getElementById('dashboardChart').getContext('2d');
                const dashboardChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Events', 'UKM'],
                        datasets: [{
                            label: 'Jumlah Data',
                            data: [
                                {{ $eventcount }},
                                {{ $ukmcount }}
                            ],
                            backgroundColor: [
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)'
                            ],
                            borderColor: [
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                precision: 0
                            }
                        }
                    }
                });
            </script>   
        </div>
        
    </div>
</body>
