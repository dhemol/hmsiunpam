<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('slug')->unique();
            $table->string('perihal')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->enum('type', ['Surat Masuk', 'Surat Keluar', 'Surat Internal', 'Laporan', 'Lain-lain']);
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
};
