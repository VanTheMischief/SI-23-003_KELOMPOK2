<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lihatEvent.css') }}">
    <title>Lihat Event</title>
</head>
<body>
    @include('partials.bphNav')

<div class="container mt-5">
    <h2 class="mb-4">Daftar Event yang Dibuat</h2>

    @if(session('Success'))
        <div class="alert alert-success">
            {{ session('Success') }}
        </div>
    @endif

    @if(count($events) === 0)
        <div class="alert alert-info">
            Belum ada event yang dibuat.
        </div>
    @else
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nama Event</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Tanggal</th>
                <th scope="col" class="col-detail">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d-m-Y') }}</td>
                    <td class="col-detail text-center">
                        <a href="{{ route('detailEvent', $event->id) }}" class="btn btn-info mx-1 ">Lihat Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
</body>
</html>
