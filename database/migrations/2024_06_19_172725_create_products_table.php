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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->timestamps();
            $table->string('name')->require();
            $table->text('description')->require();
            $table->unsignedBigInteger('product_category_id')->require();
            $table->float('rating')->nullable();
            $table->bigInteger('price')->nullable();
            $table->float('discount_percent')->nullable();
            $table->string('is_active', 1)->nullable();
            $table->string('is_hot_item', 1)->nullable();
            $table->integer('stock')->nullable();
            $table->string('volume')->nullable();

            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
