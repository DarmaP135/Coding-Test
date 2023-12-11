@extends('Dashboard.header')
@section('main')

<div class="title">Detail Mobil</div>

@if ($mobil)
<div class="content-regis">
    <form action="{{ route('book-mobil', $mobil->id) }}" method="post">
        @csrf
        <div class="user-details-login">
            <div class="input-box">
                <label for="tanggal_sewa" class="details">Tanggal Sewa</label>
                <input type="date" id="tanggal_sewa" name="tanggal_sewa">
                @error('tanggal_sewa')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-box">
                <label for="tanggal_pengembalian" class="details">Tanggal Pengembalian</label>
                <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian">
                @error('tanggal_pengembalian')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-box">
                <label for="merek" class="details">Merek Mobil</label>
                <input type="text" id="merek" name="merek" value="{{ $mobil->merek }}" readonly>
            </div>
            <div class="input-box">
                <label for="model" class="details">Model Mobil</label>
                <input type="text" id="model" name="model" value="{{ $mobil->model }}" readonly>
            </div>
            <div class="input-box">
                <label for="plat_nomor" class="details">Plat Nomor Kendaraan</label>
                <input type="text" id="plat_nomor" name="plat_nomor" value="{{ $mobil->plat_nomor }}" readonly>
            </div>

            <div class="input-box">
                <label for="harga" class="details">Harga Sewa/hari</label>
                <input type="text" id="harga" name="harga" value="<?= "Rp." . number_format($mobil->harga) ?> readonly>
            </div>
            <img class=" img-fluid" id="preview" src="{{ asset($mobil->gambar) }}" alt="{{ $mobil->merek }} - {{ $mobil->model }}">
            </div>
            <div class="button" style="width: 25%;">
                <input type="submit" value="Submit">
            </div>
    </form>
</div>
@else
<div class="empty-message">Mobil tidak ditemukan.</div>
@endif

@endsection