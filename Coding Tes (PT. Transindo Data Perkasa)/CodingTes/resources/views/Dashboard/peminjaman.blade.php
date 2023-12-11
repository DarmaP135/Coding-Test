@extends('Dashboard.header')
@section('main')


<div class="title">Peminjaman Mobil</div>
<div class="button">
    <a href="{{ route('sewa-mobil') }}">+ Sewa Mobil</a>
</div>
<div class="container-table">
    <ul class="responsive-table">
        @forelse ($pinjam as $p)
        <li class="table-header">
            <div class="col col-1">Plat Nomor</div>
            <div class="col col-2">Model</div>
            <div class="col col-3">Hari</div>
            <div class="col col-4">Harga</div>
            <div class="col col-5">Status</div>
            <div class="col col-6">Action</div>
        </li>
        <li class="table-row">
            <div class="col col-1">{{ $p->mobil->plat_nomor }}</div>
            <div class="col col-2">{{ $p->mobil->model }}</div>
            <div class="col col-3">{{ $p->total_hari }} Hari</div>
            <div class="col col-4"><?= "Rp." . number_format($p->total_harga) ?></div>
            <div class="col col-5">{{ $p->status }}</div>
            <div class="col col-6">
                <a href="{{ route('pengembalian-mobil', ['id' => $p->id]) }}" class="button">Detail</a>
            </div>
        </li>
        @empty
        <div class="empty-message">Belum memiliki data.</div>
        @endforelse
    </ul>
</div>
@endsection