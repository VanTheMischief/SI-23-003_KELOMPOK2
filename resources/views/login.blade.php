<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <form action="" method="POST">
                        @csrf
                        <img src="{{ asset('images/TelU.png') }}" class="form_pict">
                        <h1 class="formHead">Login</h1>
                        <br>
                        <select name="select_user" class="form-select w-75" required>
                            <option value="def">Pilih User</option>
                            <option value="mhs">Mahasiswa</option>
                            <option value="bph">BPH</option>
                            <option value="adm">Admin</option>
                        </select><br>
                        <input type="text" class="name" name="email" placeholder="Input Email" autocomplete="none">
                        <br><br>
                        <input type="password" class="pass" name="password" placeholder="Input password">
                        <br><br>
                        <input type="submit" class="btn_login" name="submit" value="login">
                        <p class="watermark">Silahkan kontak admin jika terjadi kendala</p>
                    </form>
                </div>
                <div class="col-md-6 pictSect d-none d-md-block"></div>
            </div>
        </div>
    </body>
</html>
