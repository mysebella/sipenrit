<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('dcpp')->nullable();
            $table->string('permohonan')->nullable();
            $table->string('foto_inpasing')->nullable();
            $table->string('foto_kep_kp_akhir')->nullable();
            $table->string('foto_kep_mpp')->nullable();
            $table->string('foto_kartu_asabri')->nullable();
            $table->string('foto_kpi')->nullable();
            $table->string('foto_ku_107')->nullable();
            $table->string('foto_surat_nikah')->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('foto_surat_kelahiran')->nullable();
            $table->string('surat_keterangan_kuliah_anak')->nullable();
            $table->string('ku_i')->nullable();
            $table->string('foto_tanda_jasa')->nullable();
            $table->string('foto_kartu_npwp')->nullable();
            $table->string('foto_rekening_buku_tabungan_btn')->nullable();
            $table->string('telephone_btn')->nullable();
            $table->string('rekening_btn')->nullable();
            $table->string('pasphoto_berwarna_suami')->nullable();
            $table->string('pasphoto_berwarna_istri')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
