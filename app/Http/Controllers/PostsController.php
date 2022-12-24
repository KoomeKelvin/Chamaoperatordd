<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //


    public function index()
    {

    }

    public function create()
    {

    }

    public function store (Request $request)
    {
       $data= $request->validate(
            [
                'slug'=>'required|max:255',
                'description'=>'required|max:255'
            ]
            );
        $post=Post::create($data);
        return redirect('/posts/'.$post->id);

    }
    public function show($id)
    {

    }

    public function edit($id)
    {

    }
    
    public function update(Request $request, Post $post)
    {
        $data= $request->validate(
            [
                'slug'=>'required|max:255',
                'description'=>'required|max:255'
            ]
            );
        $post->update($data);
        return redirect('/posts/'.$post->fresh()->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
