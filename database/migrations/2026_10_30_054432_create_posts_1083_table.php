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
        Schema::create('posts_1083', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->string('foto_post');
            $table->text('caption')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->integer('jumlah_like')->default(0);
            $table->timestamps();

            // Relasi ke tabel biodata_1083
            $table->foreign('biodata_id')->references('id')->on('biodata_1083')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_1083');
    }
};
