<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'merek',
        'model',
        'plat_nomor',
        'harga',
        'gambar',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // Di model Mobil
    public function Peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
