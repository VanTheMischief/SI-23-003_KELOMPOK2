<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <title>Data UKM</title>
    </head>
    <body>
        @include('partials.adminNav')
        <h3>Data UKM</h3>
        <br>
        <input type="text" name="searchbar" placeholder="search user">
        <input type="submit" class="btn btn-primary">
        <a href="{{ route('addukm') }}" class="btn btn-success">New Ukm</a>
        <br><br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama UKM</th>
              <th scope="col">Nama Ketua</th>
              <th scope="col">jumlah anggota</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ukms as $ukm)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $ukm -> nama_ukm }}</td>
              <td>{{ $ukm -> nama_ketua }}</td>
              <td>{{ $ukm -> jmlh_anggota }}</td>
              <td>
                    <a class="btn btn-warning" href="{{ route('dataukm.edit', $ukm->id) }}">Update</a>
                    <form action="{{ route('dataukm.destroy', $ukm->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus UKM ini?')">Delete</button>
                    </form>
                </td>

                </form>
            </tr>
            @endforeach
          </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
