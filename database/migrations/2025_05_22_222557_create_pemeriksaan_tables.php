<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel master dropdown HARUS dibuat dulu
        Schema::create('pos_uji_options', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('jenis_bukti_options', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->timestamps();
        });

        Schema::create('dokumen_sumber_options', function (Blueprint $table) {
            $table->id();
            $table->string('dokumen');
            $table->timestamps();
        });

        Schema::create('metode_pemeriksaan_options', function (Blueprint $table) {
            $table->id();
            $table->string('metode');
            $table->timestamps();
        });

        Schema::create('teknik_pemeriksaan_options', function (Blueprint $table) {
            $table->id();
            $table->string('teknik');
            $table->timestamps();
        });

        // Tabel utama dibuat PALING AKHIR
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wajib_pajak');
            $table->string('npwp', 20);
            $table->year('tahun_pajak');
            $table->string('nomor_sp2')->nullable();

            $table->foreignId('pos_uji_id')->constrained('pos_uji_options');
            $table->text('temuan_pemeriksaan')->nullable();

            $table->foreignId('jenis_bukti_id')->constrained('jenis_bukti_options');
            $table->foreignId('dokumen_sumber_id')->constrained('dokumen_sumber_options');

            $table->foreignId('metode_id')->constrained('metode_pemeriksaan_options');
            $table->foreignId('teknik_id')->constrained('teknik_pemeriksaan_options');

            $table->text('evaluasi_bukti')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->text('catatan_tambahan')->nullable();

            $table->string('supervisor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
        Schema::dropIfExists('teknik_pemeriksaan_options');
        Schema::dropIfExists('metode_pemeriksaan_options');
        Schema::dropIfExists('dokumen_sumber_options');
        Schema::dropIfExists('jenis_bukti_options');
        Schema::dropIfExists('pos_uji_options');
    }
};
