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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order')->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->dateTime('available_from')->nullable();
            $table->dateTime('available_to')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->integer('sort')->nullable();

            // Menu Category relationship
            $table->foreignId('category_id')->constrained('menu_categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
