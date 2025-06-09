<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daftEvent.css') }}">
</head>
<body>
    @include('partials.nav')
    <div class="container">
        
        <h1 class="title">Daftar Event Tersedia</h1>

        @foreach ($events as $event)
            <div class="card event-card p-4" id="card">
                <h4>{{ $event->nama_event }}</h4>
                <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->tanggal)->format('d/m/Y') }}</p> 
                <p><strong>Peserta:</strong> {{ $event->jmlh_saat_ini }} / {{ $event->jmlh_max }}</p>
                <a href="{{ route('event.daftar', $event->id) }}" class="btn btn-detail mt-2">Lihat Detail</a>
            </div>
        @endforeach

        @if ($events->isEmpty())
            <div class="alert alert-light text-center mt-4">
                Tidak ada event tersedia saat ini.
            </div>
        @endif
    </div>
</body>
</html>