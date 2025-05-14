<!-- resources/views/userNormal/daftar_event.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('partials.nav')

    <div class="container mt-5">
        <h2 class="mb-4">Daftar Event</h2>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->nama_event }}</h5>
                            <p class="card-text">
                                <strong>Penyelenggara:</strong> {{ $event->penyelenggara }} <br>
                                <strong>Ketua Pelaksana:</strong> {{ $event->ketuplak }} <br>
                                <strong>Tanggal:</strong> {{ $event->tanggal }} <br>
                                <strong>Kuota:</strong> {{ $event->jmlh_saat_ini }}/{{ $event->jmlh_max }}
                            </p>
                            @if ($event->jmlh_saat_ini < $event->jmlh_max)
                                <form action="{{ route('daftarevent.store', $event->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100">Daftar</button>
                                </form>
                            @else
                                <button class="btn btn-secondary w-100" disabled>Sudah Penuh</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
