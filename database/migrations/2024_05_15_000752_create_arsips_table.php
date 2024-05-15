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
        Schema::create('arsips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programs_id');
            $table->unsignedBigInteger('jenisArsip_id');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('programs_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('jenisArsip_id')->references('id')->on('jenis_arsips');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsips');
    }
};
