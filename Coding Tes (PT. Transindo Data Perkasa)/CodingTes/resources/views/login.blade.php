<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Coding Test</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container" style="margin-top: 10%;">
        <div class="title">Login</div>
        <div class="content-regis">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="user-details-login">
                    <div class="input-box">
                        <span class="details">Nomor Telepon</span>
                        <input type="number" name="nomor_telepon" placeholder="Masukkan nomor telepon" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Kata Sandi</span>
                        <input type="password" name="password" placeholder="Masukkan kata sandi" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <a href="{{route('register')}}" class="login-link">Don't have an account?</a>
        </div>
    </div>

</body>

</html>