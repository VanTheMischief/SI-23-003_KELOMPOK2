<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('css/admin/editUkm.css') }}" />
</head>
<body>
    @include('partials.adminNav')

    <div class="main-container">
        <div class="content">
            <h2 class="mb-4 text-center fw-bold">Formulir Update UKM</h2>
            <form action="{{ route('dataukm.update', $ukm->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_ukm" class="form-label">Nama UKM</label>
                    <input type="text" name="nama_ukm" id="nama_ukm" class="form-control" value="{{ $ukm->nama_ukm }}" required />
                </div>

                <div class="mb-3">
                    <label for="nama_ketua" class="form-label">Nama Ketua</label>
                    <input type="text" name="nama_ketua" id="nama_ketua" class="form-control" value="{{ $ukm->nama_ketua }}" required />
                </div>

                <div class="mb-3">
                    <label for="jmlh_anggota" class="form-label">Jumlah Anggota</label>
                    <input type="number" name="jmlh_anggota" id="jmlh_anggota" class="form-control" value="{{ $ukm->jmlh_anggota }}" required />
                </div>

                <div class="form-button-container">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-arrow-clockwise"></i> Update
                    </button>
                    <a href="{{ route('dataukm') }}" class="btn btn-danger btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
