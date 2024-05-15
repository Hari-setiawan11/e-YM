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
            $table->unsignedBigInteger('data_barang_id')->nullable(false);
            $table->unsignedBigInteger('distribusi_id')->nullable(false);
            $table->foreign('data_barang_id')->references('id')->on('data_barangs')->onDelete('cascade');
            $table->foreign('distribusi_id')->references('id')->on('distribusis')->onDelete('cascade');
            $table->timestamps();
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
