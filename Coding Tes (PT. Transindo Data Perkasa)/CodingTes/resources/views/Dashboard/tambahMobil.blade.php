@extends('Dashboard.header')
@section('main')


<div class="title">Tambah mobil</div>
<div class="content-regis">
    <form action="{{ route('add-mobil') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="user-details-login">
            <div class="input-box">
                <span class="details">Merek Mobil</span>
                <input type="text" name="merek" placeholder="Contoh : Toyota" required>
                @error('merek')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-box">
                <span class="details">Model Mobil</span>
                <input type="text" name="model" placeholder="Contoh : Toyota Camry" required>
                @error('model')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-box">
                <span class="details">Plat Nomor Kendaraan</span>
                <input type="text" name="plat_nomor" placeholder="Contoh : DK 2750 GAK" required>
                @error('plat_nomor')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-box">
                <span class="details">Harga Sewa/hari</span>
                <input type="text" name="harga" placeholder="Contoh : 3500000" required>
                @error('harga')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <img class="img-fluid" id="preview">
        <input class="form-control" type="file" onchange="preview()" name="gambar" id="image">
        <div class="button" style="width: 25%;">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>

@endsection