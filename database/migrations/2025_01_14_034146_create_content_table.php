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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('small_content');
            $table->string('headline_content_1');
            $table->string('headline_content_2');
            $table->string('headline_content_3');
            $table->string("circle_assets_1");
            $table->string("circle_assets_2");
            $table->string("circle_assets_3");
            $table->string("image_1");
            $table->string("image_2");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
