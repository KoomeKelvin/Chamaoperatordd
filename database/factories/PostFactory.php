<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{

    /**
     * Name of factory's corresponding model
     * 
     */
    protected $model=Post::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'slug'=>$this->faker->slug,
            'description'=>$this->faker->paragraph
        ];
    }
}
