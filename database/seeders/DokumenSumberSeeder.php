<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DokumenSumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "SPT Tahunan PPh Badan / OP",
            "SPT Masa PPN, PPh 21, 22, 23, 26",
            "Laporan Keuangan",
            "General Ledger dan Sub Ledger",
            "Invoice / Faktur Penjualan & Pembelian",
            "SSP (Surat Setoran Pajak)",
            "Faktur Pajak Keluaran / Masukan",
            "Slip Gaji / Daftar Gaji",
            "Rekening Koran",
            "Kontrak Perjanjian Usaha / Kerja",
            "Akta Pendirian / Perubahan",
            "Nota Debet / Kredit",
            "Jurnal Akuntansi",
            "Surat Jalan / Delivery Order",
            "Bukti Pembayaran (Transfer, Kas)",
            "Data Konfirmasi ke Supplier / Customer / Bank",
            "Hasil Konfirmasi Atas Piutang, Utang, Barang Konsinyasi",
            "Surat / Laporan dari Notaris, Konsultan, atau Kantor Hukum",
            "Informasi Eksternal DJP (ETP, ARDI, SILABA)",
            "Dokumen Eksternal seperti Data Perdagangan / Bea Cukai",
            "Output dari Sistem Akuntansi (file CSV, database, export)",
            "Data Forensik Digital (hasil audit sistem komputer)",
            "File PDF hasil scan dokumen asli",
            "Bukti Transaksi dari E-commerce, POS System, atau Aplikasi",
            "Kertas Kerja Pemeriksaan (KKP)",
            "Formulir Kuesioner / Ceklist Pemeriksaan",
            "Berita Acara Pemberian Keterangan",
            "Hasil Wawancara dan Observasi di Lokasi",
            "Foto, Video, atau Hasil Pengamatan Langsung",
            "Surat Permintaan Klarifikasi / Penjelasan"
        ];

        foreach ($data as $dokumen) {
            DB::table('dokumen_sumber_options')->insert(['dokumen' => $dokumen]);
        }
    }
}
