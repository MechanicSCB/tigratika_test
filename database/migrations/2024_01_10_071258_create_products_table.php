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
            $table->foreignId('category_id')->constrained();
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('sub_sub_category')->nullable();
            $table->string('code')->unique();
            $table->string('name');
            $table->boolean('available')->default(true);
            $table->string('url')->nullable();
            $table->integer('price');
            $table->integer('old_price')->nullable();
            $table->string('currency')->nullable();
            $table->string('picture')->nullable();
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
