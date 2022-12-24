<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Duty;
use App\Models\User;
use App\Models\Team;
use App\Models\Review;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;


class ReviewTest extends TestCase
{
    use InteractsWithExceptionHandling;
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->post=Post::factory()->create();
        $this->user=User::factory()->create();
        $this->team=Team::factory()->create();
        $this->duty=Duty::factory()->create();

    }

    public function test_review_table_has_expected_columns()
    {
        //$this->withoutExceptionHandling();
        $this->assertTrue(
            Schema::hasColumns('reviews', ['id', 'reviewable_id', "reviewable_type", "rating"]),
            1);
    }

    public function test_a_review_can_be_morphed_to_a_post()
    {
        $this->withoutExceptionHandling();
        $review=Review::factory()->make(
            [
            'reviewable_id'=>$this->post->id,
            'reviewable_type'=>'App\Models\Post'
            ]
            );
        $this->assertInstanceOf(Post::class, $review->reviewable);
    }

    public function test_a_review_can_be_morphed_to_a_duty()
    {
        $this->withoutExceptionHandling();
        $review=Review::factory()->make(
            [
            'reviewable_id'=>$this->post->id,
            'reviewable_type'=>'App\Models\Duty'
            ]
            );
        $this->assertInstanceOf(Duty::class, $review->reviewable);
    }
}
