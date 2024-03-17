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
        Schema::create('catalog', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название категории товаров
            $table->text('description')->nullable(); // Описание категории товаров
            $table->unsignedBigInteger('parent_id')->nullable(); // ID родительской категории
            $table->foreign('parent_id')->references('id')->on('catalog')->onDelete('cascade');
            $table->boolean('active')->default(true); // Флаг активности категории
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog');
    }
};
