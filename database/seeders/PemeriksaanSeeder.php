<?php

namespace Database\Seeders;

use App\Models\Pemeriksaan;
use App\Models\PosUjiOption;
use Illuminate\Database\Seeder;
use App\Models\JenisBuktiOption;
use App\Models\DokumenSumberOption;
use App\Models\MetodePemeriksaanOption;
use App\Models\TeknikPemeriksaanOption;

class PemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posUjiIds      = PosUjiOption::pluck('id')->toArray();
        $jenisBuktiIds  = JenisBuktiOption::pluck('id')->toArray();
        $dokumenIds     = DokumenSumberOption::pluck('id')->toArray();
        $metodeIds      = MetodePemeriksaanOption::pluck('id')->toArray();
        $teknikIds      = TeknikPemeriksaanOption::pluck('id')->toArray();

        // Data kembar untuk 3 entri
        for ($i = 1; $i <= 3; $i++) {
            Pemeriksaan::create([
                'nama_wajib_pajak'    => "PT Sumber Makmur Jaya",
                'npwp'                => '01.234.567.8-901.000',
                'tahun_pajak'         => 2024,
                'nomor_sp2'           => "SP2-123/PJ/2024",
                'pos_uji_id'          => fake()->randomElement($posUjiIds),
                'temuan_pemeriksaan'  => fake()->sentence(),
                'jenis_bukti_id'      => fake()->randomElement($jenisBuktiIds),
                'dokumen_sumber_id'   => fake()->randomElement($dokumenIds),
                'metode_id'           => fake()->randomElement($metodeIds),
                'teknik_id'           => fake()->randomElement($teknikIds),
                'evaluasi_bukti'      => fake()->sentence(),
                'kesimpulan'          => fake()->sentence(),
                'tindak_lanjut'       => fake()->sentence(),
                'catatan_tambahan'    => fake()->sentence(),
                'supervisor'          => 'Supervisor A',
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);
        }

        // Sisanya (7 data) acak
        for ($i = 4; $i <= 10; $i++) {
            Pemeriksaan::create([
                'nama_wajib_pajak'    => "PT Contoh Wajib Pajak $i",
                'npwp'                => '09.876.543.2-109.000',
                'tahun_pajak'         => 2023 + ($i % 2), // 2023 or 2024
                'nomor_sp2'           => "SP2-$i/PJ/2024",
                'pos_uji_id'          => fake()->randomElement($posUjiIds),
                'temuan_pemeriksaan'  => fake()->sentence(),
                'jenis_bukti_id'      => fake()->randomElement($jenisBuktiIds),
                'dokumen_sumber_id'   => fake()->randomElement($dokumenIds),
                'metode_id'           => fake()->randomElement($metodeIds),
                'teknik_id'           => fake()->randomElement($teknikIds),
                'evaluasi_bukti'      => fake()->sentence(),
                'kesimpulan'          => fake()->sentence(),
                'tindak_lanjut'       => fake()->sentence(),
                'catatan_tambahan'    => fake()->sentence(),
                'supervisor'          => 'Supervisor ' . $i,
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);
        }
    }
}
