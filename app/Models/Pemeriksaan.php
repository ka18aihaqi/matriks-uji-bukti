<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';
    protected $guarded = [];

    public function posUji()
    {
        return $this->belongsTo(PosUjiOption::class, 'pos_uji_id');
    }

    public function jenisBukti()
    {
        return $this->belongsTo(JenisBuktiOption::class, 'jenis_bukti_id');
    }

    public function dokumenSumber()
    {
        return $this->belongsTo(DokumenSumberOption::class, 'dokumen_sumber_id');
    }

    public function metode()
    {
        return $this->belongsTo(MetodePemeriksaanOption::class, 'metode_id');
    }

    public function teknik()
    {
        return $this->belongsTo(TeknikPemeriksaanOption::class, 'teknik_id');
    }
}
