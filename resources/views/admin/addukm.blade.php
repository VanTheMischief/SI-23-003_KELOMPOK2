<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tambah UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admin/addUkm.css') }}" />
</head>
<body>

    <div class="container">
        <h2>Tambah UKM Baru</h2>
        <form action="{{ route('addukm.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_ukm" class="form-label">Nama UKM</label>
                <input type="text" name="nama_ukm" id="nama_ukm" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="nama_ketua" class="form-label">Nama Ketua</label>
                <input type="text" name="nama_ketua" id="nama_ketua" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="jmlh_anggota" class="form-label">Jumlah Anggota</label>
                <input type="number" name="jmlh_anggota" id="jmlh_anggota" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-primary">Tambah UKM</button>
            <a href="{{ route('dataukm') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>
