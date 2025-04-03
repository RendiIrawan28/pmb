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
        Schema::create('upload_berkas', function (Blueprint $table) {
            $table->id('id_upload_berkas');
            $table->string('path');
            $table->unsignedBigInteger('id_ref_berkas');
            $table->foreign('id_ref_berkas')->references('id_ref_berkas')->on('ref_berkas');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_berkas');
    }

};
