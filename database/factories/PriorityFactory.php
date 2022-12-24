<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Priority;

class PriorityFactory extends Factory
{

    /**
     * Name of the factories corresponding model
     * 
     */
    protected $model=Priority::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'description'=>$this->faker->text()
        ];
    }
}
