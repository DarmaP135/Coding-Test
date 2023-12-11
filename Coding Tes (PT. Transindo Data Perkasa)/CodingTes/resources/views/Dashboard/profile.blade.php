@extends('Dashboard.header')
@section('main')


<div class="title">Profile</div>
<div class="content-profile">
    <form>
        <div class="user-details">
            <div class="input-box">
                <span class="details">Nama Lengkap</span>
                <input type="text" name="nama" value="{{ Auth::user()->nama}}" disabled>
            </div>

            <div class="input-box">
                <span class="details">Alamat</span>
                <input type="text" name="alamat" value="{{ Auth::user()->alamat}}" disabled>
            </div>

            <div class="input-box">
                <span class="details">Nomor Telepon</span>
                <input type="number" name="nomor_telepon" value="{{ Auth::user()->nomor_telepon}}" disabled>
            </div>

            <div class="input-box">
                <span class="details">Nomor SIM</span>
                <input type="text" name="nomor_sim" value="{{ Auth::user()->nomor_sim}}" disabled>
            </div>
        </div>
    </form>
</div>
</div>

@endsection