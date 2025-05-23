<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PosUjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Harga Pokok Penjualan (HPP)',
            'Biaya Gaji / Tunjangan',
            'Biaya Sewa',
            'Biaya Jasa / Konsultan',
            'Biaya Promosi / Representasi',
            'Biaya Bunga / Pinjaman',
            'Biaya Perjalanan Dinas',
            'Penyusutan / Amortisasi',
            'Penghasilan Final',
            'Penghasilan Tidak Kena Pajak',
            'Penyesuaian Fiskal Pos Lainnya',
            'Biaya yang Tidak Didukung Dokumen',
            'Penghasilan dari Sumber Luar Negeri',
            'Kredit Pajak Luar Negeri',
            'Pemotongan PPh Pasal 21 (cfm. Biaya Gaji)',
            'Pemotongan PPh Pasal 22',
            'Pemotongan PPh Pasal 23 atas Jasa',
            'Pemotongan PPh Pasal 26',
            'Pemotongan PPh Final',
            'Pengakuan Biaya atas Objek yang Tidak Dipotong Pajak',
            'Pajak Masukan',
            'Pajak Keluaran',
            'Penyerahan BKP/JKP Tidak Dipungut',
            'Penyerahan BKP/JKP Dibebaskan',
            'Penyerahan BKP/JKP ke Kawasan Berikat',
            'Penyerahan BKP/JKP PPN-nya Dipungut Sendiri (self-assessment)',
            'Pengkreditan Pajak Masukan yang Tidak Sah',
            'PPN atas Uang Muka',
            'Kesesuaian Faktur Pajak',
            'Penyerahan kepada Konsumen Akhir',
            'Pengujian Kewajaran Harga Transfer',
            'Beban Biaya Luar Negeri Tanpa Dokumen',
            'Pembayaran Royalti / Fee / Management Fee',
            'Beban Interest Tanpa Substansi Ekonomi',
            'Penghindaran Pajak melalui Skema Kontrak'
        ];

        foreach ($data as $nama) {
            DB::table('pos_uji_options')->insert(['nama' => $nama]);
        }
    }
}
