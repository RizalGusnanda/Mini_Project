<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'paket_id', 'status']; // Daftar kolom yang dapat diisi

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
