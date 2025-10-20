<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;
    public function definition(): array
    {
        return [
            //
            'id' => Str::uuid()->toString(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->text(),
            'author' => $this->faker->name(),
            'published' => $this->faker->boolean(),
        ];
    }
}
