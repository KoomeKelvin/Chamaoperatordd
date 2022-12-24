<?php

namespace Tests\Feature;

use App\Models\Priority;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PriorityTest extends TestCase
{
 use InteractsWithExceptionHandling;
 use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_priority_table_can_insert_data()
    {
       // $this->withoutExceptionHandling();
        $response=$this->actingAs(User::factory()->create())->post('/create_priority', ['description'=>'low']);
        $response->assertOk();
    }
    
}
