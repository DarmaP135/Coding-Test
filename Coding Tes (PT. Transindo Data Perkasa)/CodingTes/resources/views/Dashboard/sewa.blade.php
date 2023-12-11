@extends('Dashboard.header')
@section('main')

<div class="title">Sewa mobil</div>
<form action="{{ route('pencarian-mobil') }}" method="post">
    @csrf
    <label for="tanggalSewa">Tanggal Sewa:</label>
    <input type="date" name="tanggalSewa" id="tanggalSewa" required>
    <label for="tanggalPengembalian">Tanggal Pengembalian:</label>
    <input type="date" name="tanggalPengembalian" id="tanggalPengembalian" required>
    <button type="submit">Cari Mobil</button>
</form>

<div class="container-manajemen">
    @if(isset($car))
    @forelse ($car as $m)
    <div class="box">
        <div class="image">
            <img src="{{ asset($m->gambar) }}" alt="{{ $m->merek }} - {{ $m->model }}">
            <div class="card-content">
                <div class="wrapper">
                    <div class="title">{{ $m->merek }}</div>
                    <a>{{ $m->model }}</a>
                    <a>{{ $m->plat_nomor }}</a>
                    <span class="price"><?= "Rp." . number_format($m->harga) ?></span>
                    <a class="btns" href="{{ route('sewa-Mobil', ['id' => $m->id]) }}">
                        <button style="background-color: #3B71CA;">Sewa Mobil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-message">Tidak ada hasil pencarian.</div>
    @endforelse
    @else
    @forelse ($allCars as $m)
    <div class="box">
        <div class="image">
            <img src="{{ asset($m->gambar) }}" alt="{{ $m->merek }} - {{ $m->model }}">
            <div class="card-content">
                <div class="wrapper">
                    <div class="title">{{ $m->merek }}</div>
                    <a>{{ $m->model }}</a>
                    <a>{{ $m->plat_nomor }}</a>
                    <span class="price"><?= "Rp." . number_format($m->harga) ?></span>

                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-message">Belum memiliki mobil yang akan disewakan.</div>
    @endforelse
    @endif
</div>


@endsection