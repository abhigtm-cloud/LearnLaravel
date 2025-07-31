<?php

namespace Database\Factories;

use App\Models\Post;     // Ensure this is 'Post' (capital P)
use App\Models\User;     // Ensure this is 'User' (capital U)
use App\Models\Category; // Ensure this is 'Category' (capital C)
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class; // Matches the 'Post' model class

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Ensure all non-nullable columns from 'posts' table are provided data
        return [
            'title' => $this->faker->sentence(6), // Generates a fake sentence for the title
            'slug' => $this->faker->unique()->slug(), // Generates a unique slug
            'content' => $this->faker->paragraphs(3, true), // Generates 3 paragraphs of text for 'content'
            
            // Assigns to a random existing user (requires users to be seeded first)
            'user_id' => User::all()->random()->id,
            
            // Assigns to a random existing category (requires categories to be seeded first)
            'category_id' => Category::all()->random()->id,
            
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'), // Example for nullable timestamp
            'image' => $this->faker->optional()->imageUrl(640, 480, 'posts', true), // Example for nullable image URL
        ];
    }
}