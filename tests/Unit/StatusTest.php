<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Duty;
use App\Models\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{

    use RefreshDatabase;
    use InteractsWithExceptionHandling;

    public function setUp(): void
    {
        parent::setUp();
        $this->duty=Duty::factory()->create();
    }

    public function test_status_table_has_expected_columns()
    {
        $this->assertTrue(Schema::hasColumns('statuses', ['id', "level", 'duty_id']), 1);
    }

    public function test_a_status_can_be_assigned_to_a_duty()
    {
        $status=Status::factory()->make([
            'duty_id'=>$this->duty->id
        ]);
        $this->assertInstanceOf(Duty::class, $status->duty);
    }

    
    
}
