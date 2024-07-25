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
        Schema::create('ref_rencana_tempat_tinggals', function (Blueprint $table) {
            $table->id('id_rencana_tempat_tinggal');
            $table->string('nama_rencana_tempat_tinggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_rencana_tempat_tinggals');
    }
};
