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
        //
        Schema::create('tbl_provinsi', function (Blueprint $table) {
            $table->increments('kode_provinsi');
            $table->string('nama_provinsi')->unique();
            $table->index('nama_provinsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_provinsi');
    }
};
