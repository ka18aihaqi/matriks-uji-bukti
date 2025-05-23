<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeknikPemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tekniks = [
            "Verifikasi Dokumen",
            "Konfirmasi Pihak Ketiga",
            "Penelusuran / Pemeriksaan Fisik",
            "Pemeriksaan Matematik / Perhitungan",
            "Teknik Audit Berbantuan Komputer (TABK)",
            "Wawancara / Permintaan Keterangan",
            "Ekualisasi",
            "Pengujian Keterkaitan",
            "Analisis Trend / Margin / Common Size",
            "Rasio Keuangan",
            "Pendekatan Bank / Tunai",
            "Benchmarking Industri",
            "Analisis Produksi / Rendemen"
        ];

        foreach ($tekniks as $teknik) {
            DB::table('teknik_pemeriksaan_options')->insert(['teknik' => $teknik]);
        }
    }
}
