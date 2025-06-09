<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detEvent.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="form-card">
        <h2>Formulir Pendaftaran</h2>

        <p><strong>Nama Event:</strong> {{ $event->nama_event }}</p>
        <p><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
        <p><strong>Tanggal:</strong> {{ $event->tanggal }}</p>
        <p><strong>Kuota:</strong> {{ $event->jmlh_saat_ini }} / {{ $event->jmlh_max }}</p>

        @if ($event->jmlh_saat_ini < $event->jmlh_max)
            <form action="{{ route('event.store', $event->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary-custom" id="daftar">DAFTAR</button>
            </form>
        @else
            <div class="alert alert-warning text-center">Kuota sudah penuh</div>
        @endif

        <a href="{{ route('daftarevent') }}" class="btn btn-secondary">← Kembali ke Daftar Event</a>
    </div>
</body>
</html>
