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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nba', 10)->unique()->nullable();
            $table->foreignId('position_id')->constrained()->default(1);
            $table->foreignId('field_id')->constrained()->default(1);
            $table->foreignId('department_id')->constrained()->default(1);
            $table->string('name', 50);
            $table->string('username', 20)->unique();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'demisioner'])->default('aktif')->nullable();
            $table->enum('role', ['superadmin', 'admin', 'anggota'])->default('anggota')->nullable();
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
        Schema::dropIfExists('users');
    }
};
