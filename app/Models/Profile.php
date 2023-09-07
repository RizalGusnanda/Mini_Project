<?php

namespace App\Models;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Tambahkan impor model User
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Spesalisasi;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'id_roles',
        'id_kecamatans',
        'id_kelurahans',
        'id_spesalisasis',
        'telepon',
        'jenis_kelamin',
        'profile',
        'alamat',
        'pendidikan',
        'jurusan',
        'instansi',
        'norek',
        'bank',
        'sertif',
        'pengalaman',
        'penjelasan_pengalaman',
        'ajar',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
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
        return $this->belongsTo(Spesalisasi::class, 'id_spesalisasis');
    }

    public function sertifikats()
    {
        return $this->hasMany(Sertifikat::class, 'profile_id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'id_roles');
    }



}
