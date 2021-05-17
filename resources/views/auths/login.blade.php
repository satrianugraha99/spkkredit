<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login | SPK Kredit</title>
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
            <form action="/postlogin" method='post'>
                @if (session('rsukses'))
                    <div class="alert alert-success" role="alert" id="rsukses"
                        style="text-align: center; background-color: green; color: white;">
                        {{ session('rsukses') }}
                    </div>
                @endif
                @if (session('upsukses'))
                    <div class="alert alert-success" role="alert" id="upsukses"
                        style="text-align: center; background-color: green; color: white;">
                        {{ session('upsukses') }}
                    </div>
                @endif
                <br><br><br><br><br><br>
                {{-- <br>
                menampilkan error validasi
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <br> --}}
                <h3>Login</h3><br>
                {{ csrf_field() }}
                <div class="form-wrapper">
                    <input type="email" placeholder="Email" class="form-control" name="email"
                        value="{{ old('email') }}" id="login-email">
                    <i class="zmdi zmdi-email"></i>
                    @if ($errors->has('email'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('email'))) }}</div>
                    @endif
                </div>
                <div class="form-wrapper">
                    <input type="password" placeholder="Password" class="form-control" name="password"
                        value="{{ old('password') }}" id="login-password">
                    <i class="zmdi zmdi-lock"></i>
                    @if ($errors->has('password'))
                        <div style="color: red;">{{ ucfirst(trans($errors->first('password'))) }}</div>
                    @endif
                </div>
                <input type="checkbox" onclick="showpassword()">Show Password
                <button>Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <a href="/register">
                    <h4>Buat akun baru Anda.</h4>
                </a>
        </div>
        </form>
    </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>
<script>
    function showpassword() {
        var x = document.getElementById("login-password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $(document).ready(function() {
        window.setTimeout(function() {
            $("#rsukses").alert('close');
        }, 1500);

        window.setTimeout(function() {
            $("#upsukses").alert('close');
        }, 1500);
    })

</script>
