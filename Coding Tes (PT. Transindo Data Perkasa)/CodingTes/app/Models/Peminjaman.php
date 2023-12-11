<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mobil_id',
        'tanggal_sewa',
        'tanggal_pengembalian',
        'total_hari',
        'total_harga',
        'status'
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
