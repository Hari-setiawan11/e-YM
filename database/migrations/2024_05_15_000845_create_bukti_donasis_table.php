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
        Schema::create('bukti_donasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datadonasi_id');
            $table->foreign('datadonasi_id')->references('id')->on('data_donasis')->onDelete('cascade'); // Pastikan tabel ini benar ada di database
            $table->date('tanggal');
            $table->string('nominal');
            $table->string('deskripsi');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_donasis');
    }
};
