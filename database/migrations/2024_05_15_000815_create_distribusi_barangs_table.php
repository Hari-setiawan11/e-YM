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
        Schema::create('distribusi_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distribusi_id'); // Kolom ID distribusi
            $table->string('nama_barang');
            $table->decimal('volume', 10, 0);
            $table->string('satuan');
            $table->decimal('harga_satuan', 10, 0);
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('distribusi_id')->references('id')->on('distribusis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusi_barangs');
    }
};