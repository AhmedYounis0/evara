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
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price',8,2)->default(0);
            $table->string('offer')->nullable();
            $table->string('image');
            $table->text('short_description');
            $table->text('description');
            $table->integer('stock')->default(0);
            $table->string('sku')->nullable();
            $table->integer('is_featured')->default(0);
            $table->bigInteger('count')->default(0);
            $table->softDeletes();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->timestamps();
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
