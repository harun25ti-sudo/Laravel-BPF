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
        Schema::create('stories_1083', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->string('judul_sorotan', 50)->default('Highlight'); // Misal: Film, Puisi, dll seperti screenshot IG
            $table->string('foto_story');
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
        Schema::dropIfExists('stories_1083');
    }
};
