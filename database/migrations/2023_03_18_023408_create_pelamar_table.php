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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelamar');
            $table->unsignedBigInteger('posisi');
            $table->string('no_hp');
            $table->string('email');
            $table->string('ttl');
            $table->text('alamat_ktp');
            $table->text('alamat_domisili');
            $table->timestamps();

            $table->foreign('posisi')->references('id')->on('loker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
