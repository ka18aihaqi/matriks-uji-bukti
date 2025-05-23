<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetodePemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodes = [
            "Langsung",
            "Tidak Langsung"
        ];

        foreach ($metodes as $metode) {
            DB::table('metode_pemeriksaan_options')->insert(['metode' => $metode]);
        }
    }
}
