<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable("products")) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->longText('description')->nullable();
                $table->string('image')->nullable();
                $table->string('price')->nullable();
                //$table->string('category')->nullable();
                $table->string('quantity')->nullable();
                $table->timestamps();

                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');

            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};