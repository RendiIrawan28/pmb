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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nisn')->unique();
            $table->string('nik')->unique();

            $table->unsignedBigInteger('id_jenis_kelamin');
            $table->foreign("id_jenis_kelamin")->references("id_jenis_kelamin")->on("ref_jenis_kelamins");

            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            $table->unsignedBigInteger('id_agama');
            $table->foreign("id_agama")->references("id_agama")->on("ref_agamas");

            $table->string('domisili');
            $table->string('no_wa');
            $table->string('nama_orang_tua')->nullable();
            $table->string('no_wa_ortu')->nullable();

            $table->unsignedBigInteger('id_penghasilan_orang_tua');
            $table->foreign("id_penghasilan_orang_tua")->references("id_penghasilan_orang_tua")->on("ref_penghasilan_orang_tuas");

            $table->string('asal_sekolah')->nullable();
            
            $table->unsignedBigInteger('id_program_studi');
            $table->foreign("id_program_studi")->references("id_program_studi")->on("ref_program_studis");

            $table->unsignedBigInteger('id_sumber_informasi');
            $table->foreign("id_sumber_informasi")->references("id_sumber_informasi")->on("ref_sumber_informasis");

            $table->unsignedBigInteger('id_jalur_pendaftaran');
            $table->foreign("id_jalur_pendaftaran")->references("id_jalur_pendaftaran")->on("ref_jalur_pendaftarans");

            $table->unsignedBigInteger('id_rencana_tempat_tinggal');
            $table->foreign("id_rencana_tempat_tinggal")->references("id_rencana_tempat_tinggal")->on("ref_rencana_tempat_tinggals");

            $table->integer('status')->default(0); // Default status adalah 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
