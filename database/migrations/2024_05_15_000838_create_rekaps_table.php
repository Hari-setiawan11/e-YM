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
        Schema::create('rekaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datadonasi_id')->nullable(false);
            $table->unsignedBigInteger('distribusi_id')->nullable(false);
            $table->foreign('datadonasi_id')->references('id')->on('data_donasis')->onDelete('cascade');
            $table->foreign('distribusi_id')->references('id')->on('distribusis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekaps');
    }
};