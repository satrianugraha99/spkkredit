<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Register | SPK Kredit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="/colorlib-regform-17/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="/colorlib-regform-17/css/style.css">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="/img/logolpd.jpg">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/logolpd.jpg">

</head>

<body>

    <div class="wrapper" style="background-image: url('/colorlib-regform-17/images/bg.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="/colorlib-regform-17/images/imgholder.jpg" alt="">
            </div>
            <form action="/postregister" method='post'>
                <h3>Registrasi</h3><br>
                {{ csrf_field() }}
                <div class="form-wrapper">
                    <input type="text" placeholder="No. KTP" class="form-control" value="{{ old('noKtp') }}"
                        name="noKtp" id="register-noKtp">
                    <i class="zmdi zmdi-card"></i>
                    @if ($errors->has('noKtp'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('noKtp'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Nama Lengkap" class="form-control" value="{{ old('nama') }}"
                        name="nama" id="register-nama">
                    <i class="zmdi zmdi-assignment-account"></i>
                    @if ($errors->has('nama'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('nama'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Username" class="form-control" value="{{ old('name') }}"
                        name="name" id="register-name">
                    <i class="zmdi zmdi-account"></i>
                    @if ($errors->has('name'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('name'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="email" placeholder="Email" class="form-control" value="{{ old('email') }}"
                        name="email" id="register-email">
                    <i class="zmdi zmdi-email"></i>
                    @if ($errors->has('email'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('email'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="No. Telp" class="form-control" value="{{ old('noTelp') }}"
                        name="noTelp" id="register-noTelp">
                    <i class="zmdi zmdi-phone"></i>
                    @if ($errors->has('noTelp'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('noTelp'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Alamat" class="form-control" value="{{ old('alamat') }}"
                        name="alamat" id="register-alamat">
                    <i class="zmdi zmdi-pin"></i>
                    @if ($errors->has('alamat'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('alamat'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="password" placeholder="Password" class="form-control" name="password"
                        id="register-password">
                    <i class="zmdi zmdi-lock"></i>
                    @if ($errors->has('password'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('password'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="password" placeholder="Konfirmasi Password" class="form-control"
                    id="register-confirm">
                    <i class="zmdi zmdi-repeat"></i>
                    @if ($errors->has('konfirmasi_password'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('konfirmasi_password'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <select class="form-control" name="jenisKelamin" id="register-jenisKelamin">
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    @if ($errors->has('jenisKelamin'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('jenisKelamin'))) }}</div>
                    @endif
                </div>
                <button>Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <a href="/">
                    <h4>Masuk dengan akun Anda.</h4>
                </a>
        </div>
        </form>
    </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
