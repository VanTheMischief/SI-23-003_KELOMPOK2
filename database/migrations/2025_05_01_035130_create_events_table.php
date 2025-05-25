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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->string('penyelenggara');
            $table->string('ketuplak');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->integer('jmlh_max');
            $table->integer('jmlh_saat_ini');
            $table->string('data_dibutuhkan');
            $table->string('dana_terpakai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
