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
        Schema::create('bukti_pembayaran', function (Blueprint $table) {
            $table->id('id_upload_berkas_pembayaran');
            $table->string('path');
            $table->unsignedBigInteger('id_ref_berkas_pembayaran');
            $table->foreign('id_ref_berkas_pembayaran')->references('id_ref_berkas_pembayaran')->on('ref_bukti_pembayaran');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_pembayaran');
    }
};
