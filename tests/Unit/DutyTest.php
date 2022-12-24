<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Priority;
use App\Models\Team;
use App\Models\User;
use App\Models\Duty;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class DutyTest extends TestCase
{

    use InteractsWithExceptionHandling;
    use RefreshDatabase;


    public function test_a_duty_can_be_assigned_to_a_team()
    {
        $this->withoutExceptionHandling();
        $duty= Duty::factory()->make();
        $this->assertInstanceOf(Team::class, $duty->team);
    }

    public function test_a_duty_can_be_assigned_to_a_user()
    {
        $this->withoutExceptionHandling();
        $duty= Duty::factory()->make();
        $this->assertInstanceOf(User::class, $duty->user);
    }

    public function test_a_duty_can_be_assigned_to_a_priority()
    {
        $this->withoutExceptionHandling();
        $duty= Duty::factory()->make();
        $this->assertInstanceOf(Priority::class, $duty->priority);
    }

    public function test_duty_table_has_expected_columns()
    {
        $this->withoutExceptionHandling();
        $this->assertTrue(
            Schema::hasColumns('duties', ['id', "name", "description", "deadline", 'priority_id', 'team_id', 'user_id']), 1
        );
    }
    

}
