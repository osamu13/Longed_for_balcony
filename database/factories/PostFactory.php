<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = UploadedFile::fake()->image('item.jpg')->store('');

        return [
            'title' => $this->faker->realText(rand(10,25)),
            'image' => $file, 
            'content' => $this->faker->realText(rand(10,100)),
        ];
    }
}
