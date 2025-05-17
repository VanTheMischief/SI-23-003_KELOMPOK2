<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="form_palette">
        <div class="pictSect">
            <h1 class="pictSectHead">Welcome Back,</h1>
            <p class="pictSectText">Silahkan masukan identitas anda, untuk memasuki website</p>
        </div>
        <div class="formSect">
            <form action="" method="POST" >
                @csrf
                <h1 class="formHead">
                    Login
                </h1>
                <br>
                <select name="select_user" id="" required>
                    <option value="def">Pilih User</option>
                    <option value="mhs">Mahasiswa</option>
                    <option value="bph">BPH</option>
                    <option value="adm">Admin</option>
                </select><br>
                <input type="text" class="name" name="email" placeholder="Input Email" autocomplete="none" au>
                <br><br>
                <input type="password" class="pass" name="password" placeholder="Input password">
                <br><br>
                <input type="submit" class="btn_login" name="submit" value="login">
                <p class="watermark">Silahkan kontak admin jika terjadi kendala</p>
            </form>

        </div>
        </div>
    </body>
</html>
