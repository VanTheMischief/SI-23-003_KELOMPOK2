<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Akun</title>
    <link rel="stylesheet" href="{{ asset('css/acc.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <a href="{{ route('home') }}" class="link-back">return</a>
    <div class="container mt-5">
        <h2>Profil Akun</h2>
        <form action="{{ route('akun.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <img src="{{ asset('storage/uploadPictures/' . ($user->pasfoto ?? 'default.jpg')) }}" style="width: 100px; height: 100px; border-radius: 50px;"><br><br>
                <label class="form-label">Foto profil</label>
                <input type="file" name="pasfoto" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Fakultas</label>
                <input type="text" class="form-control" value="{{ $user->fakultas }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" class="form-control" value="{{ $user->jurusan }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Ganti Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password baru">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Akun</button>
                
                

        </form>
        <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
