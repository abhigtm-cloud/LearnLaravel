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
        // Table name is 'posts' (lowercase, plural)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title'); // Not nullable - needs data from factory
            $table->string('slug')->unique(); // Not nullable, unique - needs data from factory
            $table->longText('content'); // Not nullable - needs data from factory (corrected casing and syntax)
            
            // Foreign key to 'categories' table
            // Column name 'category_id' (snake_case)
            // References 'categories' table (lowercase, plural)
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            
            // Foreign key to 'users' table
            // Column name 'user_id' (snake_case)
            // References 'users' table (lowercase, plural)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};