<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Priority;
use App\Models\Team;
use App\Models\User;
use App\Models\Duty;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class DutyTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithExceptionHandling;


    public function test_a_duty_can_start_to_be_created()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $response=$this->get('/duties/new');
        $response->assertSee('Create New Duty');
    }

    public function test_a_duty_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $response=$this->postDuty();
        $duty=Duty::first();
        $response->assertRedirect('/duties/'.$duty->id);
    }

    public function test_a_duty_can_be_updated()
    {
         $this->withoutExceptionHandling();
         $this->loginUser();
         $response=$this->postDuty();
         $duty=Duty::first();
         $response=$this->patch('/duties/'.$duty->id, Duty::factory()->make()->toArray());
        $response->assertRedirect('/duties/'.$duty->fresh()->id);
    }

    public function test_all_duties_can_be_seen_by_user()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $this->postDuty();
        $response=$this->get('/duties');
        $duty=Duty::first();
        $response->assertSee($duty->description);
    }

    public function test_a_duty_can_be_seen_by_a_user()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $this->postDuty();
        $duty=Duty::first();
        $response=$this->get('/duties/'.$duty->id);
        $response->assertSee($duty->name);
    }
    
    public function test_duties_can_be_edited()
    {
        //$this->withoutExceptionHandling();
        $this->loginUser();
        $this->postDuty();
        $duty=Duty::first();
        $response=$this->get('/duties/'.$duty->id.'/edit');
        $response->assertSee($duty->name);
    }

    public function test_duty_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $this->postDuty();
        $this->assertCount(1, Duty::all());
        $duty=Duty::first();
        $response=$this->delete('/duties/'.$duty->id);
        $this->assertDatabaseMissing('duties', ['id'=>$duty->id]);
        $response->assertRedirect('/duties');
    }

    /**
     * Custom actions that is exctract of code from other CRUD actions
     */

    public function postDuty()
    {
        //$this->markTestSkipped();
        return $this->post('/duties', Duty::factory()->make()->toArray());
    }

    public function loginUser()
    {
    
        return $this->actingAs(User::factory()->withPersonalTeam()->create());
    }


}
