<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencairanSaldo extends Model
{
    use HasFactory;
    protected $table = 'pencairan_saldo';

    protected $fillable = ['id_users', 'jumlah', 'status'];

    
}