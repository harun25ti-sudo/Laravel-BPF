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
        Schema::table('biodata_1083', function (Blueprint $table) {
            $table->string('username', 50)->nullable()->after('nama');
            $table->string('banner_profil')->nullable()->after('foto_profil');
            $table->string('catatan_status', 100)->nullable()->after('banner_profil'); // Contoh: "Catatan..." seperti di IG
            $table->text('bio')->nullable()->after('catatan_status');
            $table->string('instansi', 100)->nullable()->after('bio'); // Politeknik Caltex Riau dll
            $table->string('link_website', 150)->nullable()->after('instansi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata_1083', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'banner_profil',
                'catatan_status',
                'bio',
                'instansi',
                'link_website',
            ]);
        });
    }
};
