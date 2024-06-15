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
        Schema::create('masters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->string('penyelenggara');
            $table->string('lokasi');
            $table->date('waktu');
            $table->bigInteger('hargapublish_gold');
            $table->bigInteger('hargapublish_silver');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('negara');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};
