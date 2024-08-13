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
            $table->text('tagline_description')->require();
            $table->boolean('is_for_product_page')->default('0')->require();
            $table->string('media_type')->require();
            $table->string('media_path')->require();
            $table->string('is_active')->require()->default(0);
            $table->string('is_priority')->require()->default(0);
            $table->unique(['tagline_description']);
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
