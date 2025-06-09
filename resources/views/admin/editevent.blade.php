<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/admin/editEvent.css') }}">
        <title>Edit Event</title>
    </head>
    <body>
        <form action="{{ route('dataevent.update', $events->id) }}" method="POST">
		    @csrf
		    @method('PUT')
            <div class="mb-3">
                <label for="nama_event" class="form-label">Nama event</label>
                <input type="text" class="form-control" id="nama_event" name="nama_event" value="{{ $events->nama_event }}" required>
            </div>
            <div class="mb-3">
                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $events->penyelenggara }}" required>
            </div>
            <div class="mb-3">
                <label for="ketuplak" class="form-label">Ketua pelaksana</label>
                <input type="text" class="form-control" id="ketuplak" name="ketuplak" value="{{ $events->ketuplak }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" 
                value="{{ $events->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label for="jmlh_max" class="form-label">Jumlah Maximum</label>
                <input type="number" class="form-control" id="jmlh_max" name="jmlh_max" value="{{ $events->jmlh_max }}" required>
            </div>
            <div class="mb-3">
                <label for="jmlh_saat_ini" class="form-label">Jumlah saat ini</label>
                <input type="number" class="form-control" id="jmlh_saat_ini" name="jmlh_saat_ini" value="{{ $events->jmlh_saat_ini }}" required>
            </div>
		    <button type="submit" class="btn btn-primary">Update</button>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('dataevent') }}" class="btn btn-secondary">Batal</a>
            </div>

		</form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
