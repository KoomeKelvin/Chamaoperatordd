<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Duty;
use App\Models\Comment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
   use RefreshDatabase;
   use InteractsWithExceptionHandling;


   public function setup():void{
        parent::setUp();
        $this->post=Post::factory()->create();
        $this->duty=Duty::factory()->create();
   }
   
    public function test_comments_table_has_expected_columns()
    {
        $this->withoutExceptionHandling();
        $this->assertTrue(Schema::hasColumns('comments', 
        ['id', 'commentable_id', "commentable_type", "description"]), 1);

    }

    public function test_a_comment_can_be_morphed_to_a_duty()
    {
        $this->withoutExceptionHandling();
        $comment=Comment::factory()->make(
            [
                'commentable_id'=>$this->duty->id,
                'commentable_type'=>'App\Models\Duty',
            ]
            );
        $this->assertInstanceOf(Duty::class, $comment->commentable);

    }

    public function test_a_comment_can_be_morphed_to_a_post()
    {
    $this->withoutExceptionHandling();
    $comment=Comment::factory()->make(
        [
            'commentable_id'=>$this->post->id,
            'commentable_type'=>'App\Models\Post',
        ]
        );
    $this->assertInstanceOf(Post::class, $comment->commentable);

    }
}
