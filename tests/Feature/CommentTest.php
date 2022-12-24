<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Duty;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;


class CommentTest extends TestCase
{
  use RefreshDatabase;
  use InteractsWithExceptionHandling;

  public function setUp():void{
    parent::setUp();
    $this->post=Post::factory()->create();
    $this->duty=Duty::factory()->create();
  }
    
  public function test_a_post_comment_can_be_stored()
  {
    $this->withoutExceptionHandling();
    $this->loginUser();
    $response=$this->postPostComment();
    $comment=Comment::first();
    $response->assertRedirect('/post-comments/'.$comment->id);
  }

  public function test_a_duty_comment_can_be_stored()
  {
    $this->withoutExceptionHandling();
    $this->loginUser();
    $response=$this->postDutyComment();
    $comment=Comment::first();
    $response->assertRedirect('/duty-comments/'.$comment->id);
  }




    /**
     * custom actions to extract code out of the tests 
     */

     public function loginUser()
     {
       return $this->ActingAs(User::factory()->withPersonalTeam()->create());
     }

     public function postPostComment()
     {
       return $this->post('/post-comments', Comment::factory()->make(
        [
          'commentable_id'=>$this->post->id,
          'commentable_type'=>'App\Models\Post',
        ]
        )->toArray());
     }

     public function postDutyComment()
     {
       return $this->post('/duty-comments', Comment::factory()->make(
        [
          'commentable_id'=>$this->post->id,
          'commentable_type'=>'App\Models\Duty',
        ]
        )->toArray());
     }


}
