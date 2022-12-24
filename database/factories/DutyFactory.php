<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Duty;
use App\Models\User;
use App\Models\Priority;
use App\Models\Team;

class DutyFactory extends Factory
{

    /**
     * Name of factory's correspondinng model
     */
    protected $model=Duty::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'deadline'=>$this->faker->dateTime,
            'priority_id'=>Priority::factory(),
            'team_id'=>Team::factory(),
            'user_id'=>User::factory()
        ];
    }

}
