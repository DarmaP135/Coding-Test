@extends('Dashboard.header')
@section('main')


<div class="title">Manajemen mobil</div>
<div class="button">
    <a href="{{ route('tambah-mobil') }}">+ Tambah Mobil</a>
</div>
<div class="container-manajemen">
    @forelse ($mobil as $m)
    <div class="box">
        <div class="image">
            <img src="{{ asset($m->gambar) }}" alt="{{ $m->merek }} - {{ $m->model }}">
            <div class="card-content">
                <div class="wrapper">
                    <div class="title">{{ $m->merek }}</div>
                    <a>{{ $m->model }}</a>
                    <a>{{ $m->plat_nomor }}</a>
                    <span class="price"><?= "Rp." . number_format($m->harga) ?></span>
                    <div class="btns">
                        <button>Edit</button>
                        <button style="background-color: red;">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-message">Belum memiliki mobil yang akan disewakan.</div>
    @endforelse
</div>

@endsection