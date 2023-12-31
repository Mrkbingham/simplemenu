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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            // Brand
            $table->string('brand_name')->nullable();
            $table->string('slug')->unique();
            $table->string('brand_slogan')->nullable();

            // Contact
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();

            // Colors
            $table->string('header_bg_color')->nullable();
            $table->string('header_text_color')->nullable();
            $table->string('body_bg_color')->nullable();
            $table->string('body_text_color')->nullable();
            $table->string('footer_bg_color')->nullable();
            $table->string('footer_text_color')->nullable();

            // Logo
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo_width')->nullable();
            $table->string('logo_height')->nullable();

            // Social Media
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('tiktok_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
