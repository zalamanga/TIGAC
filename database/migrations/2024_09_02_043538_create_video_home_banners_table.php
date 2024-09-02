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
        Schema::create('video_home_banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->require();
            $table->text('description')->nullable();
            $table->text('video_path')->require();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_home_banners');
    }
};
