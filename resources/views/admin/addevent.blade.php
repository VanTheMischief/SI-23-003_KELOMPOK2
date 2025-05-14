<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.adminNav')
    <div class="container mt-5">
        <h2>Tambah Event Baru</h2>
        <form action="{{ route('addevent.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_event" class="form-label">Nama event</label>
                <input type="text" class="form-control" id="nama_event" name="nama_event" required>
            </div>
            <div class="mb-3">
                <label for="penyelenggara" class="form-label">Penyelenggara</label>
                <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" required>
            </div>
            <div class="mb-3">
                <label for="ketuplak" class="form-label">Ketua pelaksana</label>
                <input type="text" class="form-control" id="ketuplak" name="ketuplak" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label for="jmlh_max" class="form-label">Jumlah Maximum</label>
                <input type="number" class="form-control" id="jmlh_max" name="jmlh_max" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah Event</button>
            <a href="{{ route('dataevent') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
