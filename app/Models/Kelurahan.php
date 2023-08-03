<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelurahan',
        'id_kecamatan'
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
