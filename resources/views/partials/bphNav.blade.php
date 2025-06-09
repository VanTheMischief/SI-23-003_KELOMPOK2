<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bphnav.css') }}">
    <title></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/TelU.png') }}" style="width: 70px; height: 70px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBph" aria-controls="navbarBph" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarBph">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->routeIs('homebph') ? 'active' : '' }}" href="{{ route('homebph') }}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->routeIs('tambahEventBph') ? 'active' : '' }}" href="{{ route('tambahEventBph') }}">Tambah Event</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->routeIs('lihatEvent') ? 'active' : '' }}" href="{{ route('lihatEvent') }}">Lihat Event</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="btn btn-danger" href="{{ route('logoutBph') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
