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
        Schema::create('biodata_1083', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nim', 20)->unique();
            $table->string('jurusan', 100);
            $table->date('tanggal_lahir');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('email', 100)->unique();
            $table->text('alamat');
            $table->string('foto_profil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_1083');
    }
};
