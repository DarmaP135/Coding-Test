@extends('Dashboard.header')
@section('main')


<div class="title">Detail Penyewaan</div>
@if ($pinjam)
<div class="content-profile">
    <form action="{{ route('pengembalian', $pinjam->id) }}" method="post">
        @csrf
        <div class="user-details">
            <div class="input-box">
                <span class="details">Tanggal Sewa</span>
                <input type="text" value="{{$pinjam->tanggal_sewa}}" disabled>
            </div>
            <div class="input-box">
                <span class="details">Tanggal Pengembalian</span>
                <input type="text" value="{{$pinjam->tanggal_pengembalian}}" disabled>
            </div>
            <div class="input-box">
                <span class="details">Merek Mobil</span>
                <input type="text" value="{{$pinjam->mobil->merek}}" disabled>
            </div>
            <div class="input-box">
                <span class="details">Moddel Mobil</span>
                <input type="text" value="{{$pinjam->mobil->model}}" disabled>
            </div>
            <div class="input-box">
                <span class="details">Plat Nomor</span>
                <input type="text" value="{{$pinjam->mobil->plat_nomor}}" disabled>
            </div>
            <div class="input-box">
                <span class="details">Total Hari</span>
                <input type="text" value="{{$pinjam->total_hari}} Hari" disabled>
            </div>
            <div class="input-box">
                <span class="details">Total Harga</span>
                <input type="text" value="<?= "Rp." . number_format($pinjam->total_harga) ?>" disabled>
            </div>
        </div>
        @if ($pinjam->status !== 'selesai')
        <div class="button" style="width:auto;">
            <input type="submit" value="Lakukan Pengembalian">
        </div>
        @endif
    </form>
</div>
</div>
@else
<div class="empty-message">Penyewaan tidak ditemukan.</div>
@endif

@endsection