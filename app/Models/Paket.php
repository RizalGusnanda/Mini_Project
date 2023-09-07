<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_paket',
        'deskripsi',
        'harga',
        'durasi_start',
        'durasi_end'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
