<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;

class Sertifikat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_id',
        'sertifikasi',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    
}
