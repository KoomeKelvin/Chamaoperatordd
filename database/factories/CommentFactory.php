<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

class CommentFactory extends Factory
{
     protected $model=Comment::class;


    public function definition()
    {
        return [
            'description'=>$this->faker->paragraph(),
        ];
    }
}
