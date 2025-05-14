<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        @include('partials.adminNav')
        <form action="{{ route('dataukm.update', $ukm->id) }}" method="POST">
		    @csrf
		    @method('PUT')
		    <label>Nama UKM</label>
		    <input type="text" name="nama_ukm" value="{{ $ukm->nama_ukm }}" required>

		    <label>Nama Ketua</label>
		    <input type="text" name="nama_ketua" value="{{ $ukm->nama_ketua }}" required>

		    <label>Jumlah Anggota</label>
		    <input type="number" name="jmlh_anggota" value="{{ $ukm->jmlh_anggota }}" required>

		    <button type="submit" class="btn btn-primary">Update</button>
		</form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
