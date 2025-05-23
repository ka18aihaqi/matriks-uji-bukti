<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PosUjiOption extends Model
{
    use HasFactory;

    // Kalau nama tabel kamu adalah `pos_uji_options`, ini sebenarnya tidak wajib
    protected $table = 'pos_uji_options';

    // Biarkan mass-assignment aktif
    protected $guarded = [];
}
