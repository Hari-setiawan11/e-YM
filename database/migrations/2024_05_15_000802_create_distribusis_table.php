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
        Schema::create('distribusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programs_id');
            $table->foreign('programs_id')->references('id')->on('programs')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('penerima_manfaat');
            $table->decimal('anggaran', 10, 0);
            // $table->decimal('pengeluaran', 10, 0)->default(0);
            $table->decimal('sisa', 10, 0)->default(0);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusis');
    }
};
