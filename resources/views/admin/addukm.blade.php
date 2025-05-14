<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.adminNav')
    <div class="container mt-5">
        <h2>Tambah UKM Baru</h2>
        <form action="{{ route('addukm.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_ukm" class="form-label">Nama UKM</label>
                <input type="text" class="form-control" id="nama_ukm" name="nama_ukm" required>
            </div>
            <div class="mb-3">
                <label for="nama_ketua" class="form-label">Nama Ketua</label>
                <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" required>
            </div>
            <div class="mb-3">
                <label for="jmlh_anggota" class="form-label">Jumlah Anggota</label>
                <input type="number" class="form-control" id="jmlh_anggota" name="jmlh_anggota" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah UKM</button>
            <a href="{{ route('dataukm') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
