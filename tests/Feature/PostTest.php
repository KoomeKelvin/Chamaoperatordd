<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\RefreshDatabase;
class PostTest extends TestCase
{
   use InteractsWithExceptionHandling;
   use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_post_can_be_created()
    {
        //$this->withoutExceptionHandling();
        $response=$this->actingAs(User::factory()->create())->post('/posts', [
            'slug'=>'inspirational-post-1',
            'description'=>'six months of hardwork and focus can put you 5 years ahead of your life'
        ]);
        $post=Post::first();
        $response->assertRedirect('/posts/'.$post->id);
    }

    public function test_a_post_can_be_updated()
    {
        $this->withoutExceptionHandling();
        
        $this->actingAs(User::factory()->create());
        $this->post('/posts', [
            'slug'=>'inspirational-post-1',
            'description'=>'six months of hardwork and focus can put you 5 years ahead of your life'
        ]);
        $post=Post::first();
        $response=$this->patch('/posts/'.$post->id, [
            'slug'=>'inspirational-post-2',
            'description'=>'the harder i work the luckier i get'
        ]);
        $this->assertEquals('inspirational-post-2', Post::first()->slug);
       $response->assertRedirect('/posts/'.$post->fresh()->id);
    }

    public function test_a_post_can_be_deleted()
    {
       // $this->withoutExceptionHandling();
        
        $this->actingAs(User::factory()->create());
        $this->post('/posts', [
            'slug'=>'inspirational-post-1',
            'description'=>'six months of hardwork and focus can put you 5 years ahead of your life'
        ]);
        $this->assertCount(1, Post::all());
        $post=Post::first();
        $response=$this->delete('/posts/'.$post->id);
        $this->assertCount(0, Post::all());
       // $response->assertRedirect('layouts.duties.');
    }



}

