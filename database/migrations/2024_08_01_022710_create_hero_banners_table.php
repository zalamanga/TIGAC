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
            $table->string('description')->nullable();
            $table->string('media_type');
            $table->string('media_path');
            $table->string('media_link')->nullable()->unique();
            $table->string('is_active')->nullable()->unique()->default(0);
            $table->string('is_priority')->nullable()->unique()->default(0);
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
