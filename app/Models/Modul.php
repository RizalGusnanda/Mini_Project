<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Tambahkan impor model User
class Modul extends Model
{
    protected $fillable = [
        'user_id',
        'nama_modul',
        'deskripsi_modul',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
