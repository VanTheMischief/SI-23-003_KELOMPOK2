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
        <h3>User management</h3>
        <br>
        <input type="text" name="searchbar" placeholder="search user">
        <input type="submit" class="btn btn-primary">
        <a href="{{ route('adduser') }}" class="btn btn-success">+ tambah user baru</a>
        <br><br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Email</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Ketua BPH</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $index => $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user -> nama }}</td>
              <td>{{ $user -> email }}</td>
              <td>{{ $user -> fakultas }}</td>
              <td>{{ $user -> jurusan }}</td>
              <td>{{ $user -> ukm -> nama_ukm ?? 'N/A' }}</td>
              <td><a class="btn btn-warning" href="{{ route('kelolauser.edit', $user->id) }}">Update</a>
                <form action="{{ route('kelolauser.destroy', $user->id) }} " method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-danger" href="">Delete</a></td>
                </form>
            </tr>
            @endforeach
          </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
