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
        Schema::create('books', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title')->nullable();
            $table->string('author')->nullable();
            $table->text('overview')->nullable();
            $table->date('published_date')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->string('image_url')->nullable();
            $table->unsignedInteger('pages')->nullable();
            $table->string('categories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
