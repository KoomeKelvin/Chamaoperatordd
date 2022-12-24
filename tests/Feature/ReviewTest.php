<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Review;
use App\Models\Post;
use App\Models\User;
use App\Models\Duty;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;


class ReviewTest extends TestCase
{
    use RefreshDatabase;
    use InteractsWithExceptionHandling;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp():void{
        parent::setUp();
        $this->duty=Duty::factory()->create();
        $this->post=Post::factory()->create();
    }

    public function test_a_review_can_start_to_be_created()
    {
    //$this->withoutExceptionHandling();
    $this->loginUser();
    $response=$this->get('/reviews/new');
    $response->assertSee('Create new Review');
    }

    public function test_a_post_review_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $response=$this->postPostReview();
        $review=Review::first();
        $response->assertRedirect('post-reviews/'.$review->id); 
    }

    public function test_a_duty_review_can_be_created()
    {
        $this->withoutExceptionHandling();
        $this->loginUser();
        $response=$this->postDutyReview();
        $review=Review::first();
        $response->assertRedirect('duty-reviews/'.$review->id); 

    }

    // public function test_all_reviews_can_be_seen_by_a_user()
    // {
    //     $this->withoutExceptionHandling();
    //     $this->loginUser();
    //     $response=$this->get('/duties');
    //     $response->assertSee($duty->id)
    

    // }



    /**
     * Custom actions that is extract of code from other CRUD actions.
     */
    
     public function loginUser()
     {
         return $this->ActingAs(User::factory()->withPersonalTeam()->create());
     }
     
     public function postPostReview()
     {
        return $this->post('/post-reviews', Review::factory()->make(
            [
            'reviewable_id'=>$this->post->id,
            'reviewable_type'=>'App\Models\Post'
            ]
            )->toArray());
     }
     public function postDutyReview()
     {
        return $this->post('/duty-reviews', Review::factory()->make(
            [
            'reviewable_id'=>$this->post->id,
            'reviewable_type'=>'App\Models\Duty'
            ]
            )->toArray());
     }
}
