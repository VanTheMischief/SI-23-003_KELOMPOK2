<!-- resources/views/userNormal/editEvent.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Formulir Edit Event</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_event" class="form-label">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" value="{{ $event->nama_event }}" required>
        </div>

        <div class="mb-3">
            <label for="ketuplak" class="form-label">Ketua Pelaksana</label>
            <input type="text" name="ketuplak" class="form-control" value="{{ $event->ketuplak }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $event->lokasi }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $event->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="jmlh_max" class="form-label">Kuota Maksimal</label>
            <input type="number" name="jmlh_max" class="form-control" value="{{ $event->jmlh_max }}" required>
        </div>

        <div class="mb-3">
            <label for="jmlh_saat_ini" class="form-label">Jumlah Saat Ini</label>
            <input type="number" name="jmlh_saat_ini" class="form-control" value="{{ $event->jmlh_saat_ini }}" required>
        </div>

        <div class="mb-3">
            <label for="dana_dibutuhkan" class="form-label">Dana Dibutuhkan</label>
            <input type="input" name="dana_dibutuhkan" class="form-control" value="{{ $event->dana_dibutuhkan }}" required>
        </div>

        <div class="mb-3">
            <label for="dana_terpakai" class="form-label">Dana Terpakai</label>
            <input type="input" name="dana_terpakai" class="form-control" value="{{ $event->dana_terpakai }}" required>
        </div>

        <div class= "mb-3">
            <label> Foto hasil kegiatan  </label>
            <input type="file" class="form-control" name="foto_hasil" value="{{
            $event->foto_hasil }}">
            
        </div>

        <div class="form-button-container">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-arrow-clockwise"></i> Update
            </button>
            <a href="{{ route('lihatEvent') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
