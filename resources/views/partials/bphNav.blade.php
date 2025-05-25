<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/bphnav.css') }}">
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="">
            <div class="container">
                <a class="navbar-brand" href="#">Bph Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('homebph') ? 'nav-link active' : 'nav-link' }}" aria-current="page" href="{{ route('homebph') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('tambahEventBph') ? 'nav-link active' : 'nav-link' }}" href="{{ route('tambahEventBph') }}">Tambah event</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ request()->routeIs('lihatEvent') ? 'nav-link active' : 'nav-link' }}" href="{{ route('lihatEvent') }}">Lihat event</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="{{ route('logoutBph') }}" id="logout" >Logout</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        
