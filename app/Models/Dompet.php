<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    protected $table = 'dompets';
    protected $fillable = [
        'id_users',
        'paket_id',
        'pembayaran_id',
        'saldo',
    ];

    use HasFactory;
}