<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tag::class;
    public function definition(): array
    {
        // Custom list of programming/engineering-related words
        $techWords = [
            'Laravel',
            'PHP',
            'C++',
            'C#',
            'JavaScript',
            'TypeScript',
            'Python',
            'React',
            'Node.js',
            'HTML',
            'CSS',
            'SQL',
            'NoSQL',
            'OOP',
            'API',
            'REST',
            'MVC',
            'Git',
            'Docker',
            'Linux',
            'AI',
            'Machine Learning',
            'Data Structures',
            'Algorithms',
            'Engineering',
            'Microservices',
            'Testing',
            'Design Patterns',
            'DevOps',
            'Framework',
            'Composer'
        ];

        return [
            'title' => $this->faker->unique()->randomElement($techWords),
        ];
    }
}
