<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = Str::title($this->faker->words(5, true));
        $slug = Str::slug($title);
        $body = $this->faker->paragraphs(5, true);
        $published = true;
        $published_at = $this->faker->dateTimeThisYear();

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $body,
            'published' => $published,
            'published_at' => $published_at,
        ];
    }
}
