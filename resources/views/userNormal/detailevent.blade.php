<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daftEvent.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Detail Event</h2>

        <div class="card p-4 shadow-sm">
            <p><strong>Nama:</strong> {{ $event->nama_event }}</p>
            <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
            <p><strong>Tanggal:</strong> {{ $event->tanggal }}</p>
            <p><strong>Jumlah Maksimal:</strong> {{ $event->jmlh_max }}</p>
            <p><strong>Jumlah Saat Ini:</strong> {{ $event->jmlh_saat_ini }}</p>

            @if ($event->jmlh_saat_ini < $event->jmlh_max)
                <form action="{{ route('event.store', $event->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success mt-3">Daftar</button>
                </form>
            @else
                <div class="alert alert-warning mt-3">Kuota sudah penuh</div>
            @endif

            <a href="{{ route('daftarevent') }}" class="btn btn-secondary mt-3">← Kembali ke Daftar Event</a>
        </div>
    </div>
</body>
</html>
