<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <title>Edit user</title>
    </head>
    <body>
        <div class="container mt-4">
          <h3>Edit user</h3>
          <br>
          <form action="{{ route('kelolauser.update', $user -> id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="nama" class="form-label">Nama: </label>
              <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" name="fakultas" class="form-control" value="{{ $user->fakultas }}">
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="{{ $user->jurusan }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kelolauser') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
          </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
