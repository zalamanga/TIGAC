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
        Schema::create('masterpieces', function (Blueprint $table) {
            $table->id();
            $table->string("name")->require()->unique();
            $table->string("slug")->require()->unique();
            $table->string("detail_link")->require()->unique();
            $table->string("thumbnail")->require();
            $table->string("thumbnail_short_description")->nullable();
            $table->boolean("is_active")->require()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masterpieces');
    }
};
