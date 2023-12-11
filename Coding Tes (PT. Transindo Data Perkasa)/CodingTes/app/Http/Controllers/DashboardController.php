<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function profile()
    {
        return view('Dashboard.profile');
    }

    public function manajemenIndex()
    {
        $mobil = Mobil::all();
        return view(
            'Dashboard.manajemen',
            ['mobil' => $mobil]
        );
    }


    public function showAll()
    {
        $mobil = Mobil::with('user')->take(6)->get();
        return view(
            'landingPage',
            ['mobil' => $mobil]
        );
    }


    public function peminjamanIndex()
    {
        $user = Auth::user();

        // Mengambil mobil berdasarkan user yang sedang login
        $pinjam = Peminjaman::where('user_id', $user->id)->get();

        return view('Dashboard.peminjaman', ['pinjam' => $pinjam]);
    }

    public function tambahMobil()
    {
        return view('Dashboard.tambahMobil');
    }

    public function addMobil(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'merek' => 'required|string',
            'model' => 'required|string',
            'plat_nomor' => 'required|string|unique:mobils',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur sesuai kebutuhan Anda
        ]);

        // Simpan gambar ke dalam folder public/images
        $gambarPath = $request->file('gambar')->move('images', $request->file('gambar')->getClientOriginalName());

        Mobil::create([
            'user_id'  => $user->id,
            'merek' => $request->merek,
            'model' => $request->model,
            'plat_nomor' => $request->plat_nomor,
            'harga' => $request->harga,
            'status' => 'Tersedia',
            'gambar' => $gambarPath, // Simpan path gambar ke dalam kolom gambar di database
        ]);

        return redirect()->route('manajemen-mobil')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function sewaMobil()
    {
        $allCars = Mobil::all();

        return view('Dashboard.sewa', ['allCars' => $allCars]);
    }

    public function pencarianMobil(Request $request)
    {
        $tanggalSewa = $request->input('tanggalSewa');
        $tanggalPengembalian = $request->input('tanggalPengembalian');

        $hasilPencarian = Mobil::whereDoesntHave('peminjaman', function ($query) use ($tanggalSewa, $tanggalPengembalian) {
            $query->where(function ($q) use ($tanggalSewa, $tanggalPengembalian) {
                $q->where('peminjamen.tanggal_pengembalian', '>=', $tanggalSewa)
                    ->orWhere('peminjamen.tanggal_sewa', '<=', $tanggalPengembalian);
            });
        })->get();
        // Tampilkan hasil pencarian di halaman yang sama
        return view('Dashboard.sewa', ['car' => $hasilPencarian]);
    }

    public function rentMobil($id)
    {
        $mobil = Mobil::findorfail($id);
        return view('Dashboard.sewaMobil', compact('mobil'));
    }


    public function bookMobil(Request $request, $id)
    {
        $user = Auth()->user();
        // Validasi form input
        $request->validate([
            'tanggal_sewa' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_sewa',
            // tambahkan validasi lain sesuai kebutuhan
        ]);
        // Mendapatkan data mobil
        $mobil = Mobil::findorfail($id);

        // Menghitung total hari
        $tanggalSewa = new \DateTime($request->tanggal_sewa);
        $tanggalPengembalian = new \DateTime($request->tanggal_pengembalian);
        $interval = $tanggalSewa->diff($tanggalPengembalian);
        $totalHari = $interval->days + 1; // Jumlah hari inklusif

        // Menghitung total harga
        $id_mobil = $mobil->id;
        $totalHarga = $totalHari * $mobil->harga;

        // Simpan data peminjaman ke database
        Peminjaman::create([
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'total_hari' => $totalHari,
            'total_harga' => $totalHarga,
            'status' => 'Disewa',
            'mobil_id' => $id_mobil,
            'user_id' => $user->id,
            // tambahkan field lain sesuai kebutuhan
        ]);

        $mobil->update(['status' => 'Tidak Tersedia']);

        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->route('peminjaman-mobil')->with('success', 'Booking berhasil dilakukan.');
    }

    public function pengembalianMobil($id)
    {
        $pinjam = Peminjaman::findorfail($id);
        return view('Dashboard.pengembalian', compact('pinjam'));
    }

    public function pengembalian(Request $request, $id)
    {
        // Mendapatkan data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);

        // Menghitung total hari
        $tanggalPengembalian = new \DateTime();
        $tanggalSewa = new \DateTime($peminjaman->tanggal_sewa);
        $interval = $tanggalSewa->diff($tanggalPengembalian);
        $totalHari = $interval->days + 1; // Jumlah hari inklusif

        // Menghitung total harga
        $totalHarga = $totalHari * $peminjaman->mobil->harga;

        // Update data peminjaman
        $peminjaman->update([
            'tanggal_pengembalian' => $tanggalPengembalian,
            'total_hari' => $totalHari,
            'total_harga' => $totalHarga,
            'status' => 'Selesai',
        ]);


        $peminjaman->mobil->update(['status' => 'Tersedia']);

        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->route('peminjaman-mobil')->with('success', 'Pengembalian berhasil.');
    }
}
