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
        Schema::create('hero_banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->require()->unique();
            $table->string('tagline')->require()->unique();
            $table->text('tagline_description')->require()->unique();
            $table->string('media_type');
            $table->string('media_path');
            $table->string('is_active')->nullable()->default(0);
            $table->string('is_priority')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_banners');
    }
};
