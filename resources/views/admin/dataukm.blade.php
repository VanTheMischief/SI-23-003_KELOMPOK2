<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data UKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/admin/dataUkm.css') }}" />
</head>
<body>
    @include('partials.adminNav')

    <div class="head d-flex align-items-center justify-content-between">
        <h3 class="head-text">DATA UKM</h3>
        <div class="input d-flex align-items-center">
            <form action="{{ route('dataukm') }}" method="GET" class="d-flex align-items-center">
                <div class="search-container position-relative">
                    <input type="text" name="search" placeholder="Search UKM..." value="{{ request('search') }}" class="form-control" />
                    <i class="fa fa-search search-icon position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);"></i>
                </div>
                <button id="searchButton" class="btn btn-primary ms-2" type="submit">Search</button>
            </form>
            <a href="{{ route('addukm') }}" id="addButton" class="btn btn-success ms-3">+ Tambah UKM</a>
        </div>
    </div>

    <br>

    @if($ukms->isEmpty())
        <div class="alert alert-warning text-center mt-3">
            Tidak ada UKM yang cocok dengan pencarian.
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama UKM</th>
                <th scope="col">Nama Ketua</th>
                <th scope="col">Jumlah Anggota</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ukms as $ukm)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $ukm->nama_ukm }}</td>
                <td>{{ $ukm->nama_ketua }}</td>
                <td>{{ $ukm->jmlh_anggota }}</td>
                <td>
                    <a href="{{ route('dataukm.edit', $ukm->id) }}" class="btn btn-warning">
                        <i class="fa fa-rotate"></i> Update
                    </a>
                    <form action="{{ route('dataukm.destroy', $ukm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus UKM ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
