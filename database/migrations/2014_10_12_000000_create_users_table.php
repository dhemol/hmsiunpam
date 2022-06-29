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
            $table->string('nba', 10);
            $table->foreignId('position_id')->constrained()->default(1);
            $table->foreignId('field_id')->constrained()->default(1);
            $table->foreignId('department_id')->constrained()->default(1);
            $table->string('name', 50);
            $table->string('username', 20)->unique();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address');
            $table->string('no_hp', 20);
            $table->string('image')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'demisioner'])->default('aktif');
            $table->enum('role', ['superadmin', 'admin', 'anggota'])->default('anggota');
            $table->rememberToken()->nullable();
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
