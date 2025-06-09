<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/kelolaUser.css') }}">
        <title>Kelola User</title>
    </head>
    <body>
        @include('partials.adminNav')

        <div class="head">
            <h3 class="head-text">USER MANAGEMENT</h3>
            <div class="input">
                <form action="{{ route('kelolauser') }}" method="GET" class="d-flex align-items-center">
                    <div class="search-container">
                        <input type="text" name="search" placeholder="Search User" value="{{ request('search') }}">
                        <i class="fa fa-search search-icon"></i>
                    </div>
                    <button class="btn custom-submit ms-2" type="submit" id="searchButton">Submit</button>
                    <a href="{{ route('adduser') }}" class="btn custom-add ms-2" id="addButton">+ Tambah User Baru</a>
                </form>
            </div>
        </div>

        <br><br>

        @if($users->isEmpty())
            <div class="alert alert-warning text-center mt-3">
                Tidak ada user yang cocok dengan pencarian.
            </div>
        @endif

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
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->fakultas }}</td>
                    <td>{{ $user->jurusan }}</td>
                    <td>{{ $user->ukm->nama_ukm ?? 'N/A' }}</td>
                    <td>
                        <a class="btn btn-warning custom-update" href="{{ route('kelolauser.edit', $user->id) }}">
                            <i class="fa fa-rotate"></i> Update
                        </a>
                        <form action="{{ route('kelolauser.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger custom-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
