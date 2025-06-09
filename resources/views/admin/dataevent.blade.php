<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/dataEvent.css') }}">
</head>
<body>
    @include('partials.adminNav')

    <div class="head">
        <div class="head-text">DATA EVENT</div>
        <div class="input ms-auto d-flex align-items-center">
            <form action="{{ route('dataevent') }}" method="GET" class="d-flex align-items-center">
                <div class="search-container">
                    <input type="text" name="search" placeholder="Search Event..." value="{{ request('search') }}">
                    <i class="fa fa-search search-icon"></i>
                </div>
                <button id="searchButton" class="btn custom-submit ms-2" type="submit">Search</button>
            </form>
            <a href="{{ route('addevent') }}" id="addButton" class="btn custom-add ms-2">+ Tambah Event</a>
        </div>
    </div>

    @if($events->isEmpty())
        <div class="alert alert-warning text-center mt-3">
            Tidak ada event yang cocok dengan pencarian.
        </div>
    @endif

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Event</th>
                <th scope="col">Penyelenggara</th>
                <th scope="col">Ketuplak</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah Maksimal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $event->nama_event }}</td>
                <td>{{ $event->penyelenggara }}</td>
                <td>{{ $event->ketuplak }}</td>
                <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('Y/m/d') }}</td>
                <td>{{ $event->jmlh_max }}</td>
                <td>
                    <a href="{{ route('dataevent.edit', $event->id) }}" class="btn btn-warning custom-update">
                        <i class="fa fa-rotate"></i> Update
                    </a>
                    <form action="{{ route('dataevent.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger custom-delete" onclick="return confirm('Yakin ingin menghapus Event ini?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
