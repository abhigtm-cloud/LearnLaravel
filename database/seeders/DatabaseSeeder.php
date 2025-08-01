<?php

namespace Database\Seeders;

use App\Models\Category; // Correct: Capital 'C'
use App\Models\Post;     // Correct: Capital 'P'
use App\Models\User;     // Correct: Capital 'U'
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // CRITICAL: Add this for password hashing

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create a specific Test User
        //    - Use 'User::create()' (capital 'U')
        //    - HASH THE PASSWORD using Hash::make()
        //    - Correct email typo 'exmple.com' to 'example.com'
        User::create([
            "name" => "Test User",
            "email" => "test@example.com", // Corrected typo
            "password" => Hash::make('password'), // CRITICAL: Password MUST be hashed
            // 'email_verified_at' => now(), // Optional: if your 'users' table has this column
        ]);

        // 2. Create Categories
        //    - Use 'Category::create()' (capital 'C')
        //    - This must run BEFORE Post::factory() because posts need categories
        $categories = [
            "Technology",
            "Health",
            "Science",
            "Games",
            "Politics",
            "Entertainment"
        ];

        foreach ($categories as $cat) {
            Category::create(["name" => $cat]);
        }

        // 3. Create Posts using the factory
        //    - Use 'Post::factory()' (capital 'P')
        //    - This must run AFTER users and categories are created,
        //      as the PostFactory links to existing user and category IDs.
        Post::factory(100)->create();
    }
}