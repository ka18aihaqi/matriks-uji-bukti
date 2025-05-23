<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisBuktiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Surat atau Tulisan',
            'Keterangan Ahli',
            'Keterangan Saksi',
            'Pengakuan Para Pihak',
            'Pengetahuan Hakim'
        ];

        foreach ($data as $jenis) {
            DB::table('jenis_bukti_options')->insert(['jenis' => $jenis]);
        }
    }
}
