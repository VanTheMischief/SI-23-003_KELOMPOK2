<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Event</title>
    <link rel="stylesheet" href="{{ asset('css/riwayatEvent.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.nav')

    <div class="container py-5">
        <h2 class="text-center mb-5 title">Riwayat Event Anda</h2>

        @forelse ($events as $event)
            <div class="card mb-4 shadow event-card p-4">
                <h4 class="mb-2">{{ $event->nama_event }}</h4>
                <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
                <p><strong>Tanggal:</strong> {{ $event->tanggal }}</p>

                <form action="{{ route('event.cancel', $event->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Batalkan Pendaftaran</button>
                </form>
            </div>
        @empty
            <div class="alert alert-warning text-center">
                Anda belum mendaftar event apa pun.
            </div>
        @endforelse
    </div>
</body>
</html>
