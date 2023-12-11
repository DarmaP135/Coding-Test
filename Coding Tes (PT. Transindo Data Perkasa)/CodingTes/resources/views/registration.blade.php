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
    <div class="container">
        <div class="title">Registrasi</div>
        <div class="content-regis">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="user-details-login">
                    <div class="input-box">
                        <span class="details">Nama Lengkap</span>
                        <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
                        @error('nama')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Alamat</span>
                        <input type="text" name="alamat" placeholder="Masukkan alamat" required>
                        @error('alamat')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Nomor Telepon</span>
                        <input type="number" name="nomor_telepon" placeholder="Masukkan nomor telepon" required>
                        @error('nomor_telepon')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Nomor SIM</span>
                        <input type="text" name="nomor_sim" placeholder="Masukkan nomor SIM" required>
                        @error('nomor_sim')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Kata Sandi</span>
                        <input type="password" name="password" placeholder="Masukkan kata sandi" required>
                        @error('password')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Konfirmasi Kata Sandi</span>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi kata sandi" required>
                        @error('password_confirmation')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="role-details">
                    <input type="radio" name="role" id="dot-1" value="Pemilik Mobil">
                    <input type="radio" name="role" id="dot-2" value="Penyewa Mobil">
                    <span class="role-title">Daftar Sebagai</span>

                    @error('role')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="role">Pemilik Mobil</span>
                        </label>

                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="role">Penyewa Mobil</span>
                        </label>
                    </div>
                </div>


                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <a href="{{route('login')}}" class="login-link">Already have an account</a>
        </div>
    </div>

</body>

</html>