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
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('phone');
            $table->string('banner_image')->nullable()->after('profile_image');
            $table->string('title')->nullable()->after('banner_image'); // e.g. UI/UX Designer
            $table->text('bio')->nullable()->after('title'); // short bio / greeting
            $table->text('about')->nullable()->after('bio'); // longer description
            $table->string('address')->nullable()->after('about');
            $table->string('behance_url')->nullable()->after('address');
            $table->string('dribbble_url')->nullable()->after('behance_url');
            $table->string('instagram_url')->nullable()->after('dribbble_url');
            $table->string('linkedin_url')->nullable()->after('instagram_url');
            $table->string('cv_file')->nullable()->after('linkedin_url');
            $table->string('skills')->nullable()->after('cv_file'); // comma separated or skills text
            $table->string('services')->nullable()->after('skills'); // e.g. UI/UX, Photographer, Freelancer
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->dropColumn([
                'profile_image',
                'banner_image',
                'title',
                'bio',
                'about',
                'address',
                'behance_url',
                'dribbble_url',
                'instagram_url',
                'linkedin_url',
                'cv_file',
                'skills',
                'services',
            ]);
        });
    }
};
