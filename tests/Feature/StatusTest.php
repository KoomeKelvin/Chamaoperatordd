<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Duty;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class StatusTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithExceptionHandling;
    
    public function setUp():void
    {
        parent::setUp();
        $this->duty=Duty::factory()->create();
    }

    public function test_status_can_be_stored()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $response = $this->post('/duty-status', Status::factory()->make(
            [
                'duty_id'=>$this->duty->id,
            ]
        )->toArray());
        $status=Status::first();
        $response->assertRedirect('/duty-status/'.$status->id);
    }



    /**
     * custom actions to refactor status test 
     */
    public function loginUser()
    {
        return $this->ActingAs(User::factory()->withPersonalTeam()->create());
    }
}
