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
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('domisili');
            $table->string('no_wa');
            $table->string('nama_orang_tua')->nullable();
            $table->string('no_wa_ortu')->nullable();
            $table->string('penghasilan_orang_tua')->nullable();
            $table->string('asal_sekolah')->nullable();
            // $table->string('program_studi')->nullable();
            // $table->string('sumber_informasi')->nullable();
            // $table->string('rencana_tempat_tinggal')->nullable();
            // $table->string('jalur_pendaftaran')->nullable();
            $table->unsignedBigInteger('id_program_studi');
            $table->foreign("id_program_studi")->references("id_program_studi")->on("program_studis");

            $table->unsignedBigInteger('id_sumber_informasi');
            $table->foreign("id_sumber_informasi")->references("id_sumber_informasi")->on("sumber_informasis");

            $table->unsignedBigInteger('id_jalur_pendaftaran');
            $table->foreign("id_jalur_pendaftaran")->references("id_jalur_pendaftaran")->on("jalur_pendaftarans");

            $table->unsignedBigInteger('id_rencana_tempat_tinggal');
            $table->foreign("id_rencana_tempat_tinggal")->references("id_rencana_tempat_tinggal")->on("rencana_tempat_tinggals");


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
