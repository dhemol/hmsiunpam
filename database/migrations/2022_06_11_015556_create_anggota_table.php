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
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigincrements('nik');
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            $table->string('username', 50)->unique();
            $table->string('password', 100);
            $table->string('address');
            $table->string('no_hp', 20);
            $table->string('position');
            $table->string('images')->nullable();
            $table->boolean('role', 1)->default(0);
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
        Schema::dropIfExists('anggota');
    }
};
