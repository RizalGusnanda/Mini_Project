<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'id_users',
        'id_kecamatans',
        'id_kelurahans',
        'id_spesalisasis',
        'telepon',
        'jenis_kelamin',    
        'profile',
        'sertif',
        'pengalaman',
        'penjelasan_pengalaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Menambahkan 'id_users' sebagai foreign key
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatans');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahans');
    }

    public function spesialisasi()
    {
        return $this->belongsTo(Spesalisasis::class, 'id_spesalisasis');
    }

}
