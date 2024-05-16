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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название категории товаров
            $table->text('description')->nullable(); // Описание категории товаров
            $table->unsignedBigInteger('parent_id')->nullable(); // ID родительской категории
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bSoolean('active')->default(true); // Флаг активности категории
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.S
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
