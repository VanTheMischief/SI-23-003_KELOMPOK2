<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Akun</title>
    <link rel="stylesheet" href="{{ asset('css/acc.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="account-container">
        <a href="{{ route('home') }}" class="link-back">← Kembali</a>
        <div class="profile-box">
            <div class="profile-info text-center">
                <img src="{{ asset('storage/uploadPictures/' . ($user->pasfoto ?? 'default.jpg')) }}" class="profile-pic">
                <h3>{{ $user->nama }}</h3>
                <p>{{ $user->jurusan }}, {{ $user->fakultas }}</p>
            </div>

            <form action="{{ route('akun.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-4 mt-3">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Fakultas</label>
                        <input type="text" class="form-control" value="{{ $user->fakultas }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" value="{{ $user->jurusan }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Ganti Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password baru">
                    </div>
                    <div class="col-md-6">
                        <label>Foto Profil</label>
                        <input type="file" name="pasfoto" class="form-control">
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn-save">Save Changes</button>
                </div>
            </form>

            <form action="{{ route('logout') }}" method="POST" class="text-center mt-2">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
