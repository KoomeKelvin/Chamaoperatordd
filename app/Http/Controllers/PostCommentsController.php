<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class PostCommentsController extends Controller
{
    //

    public function store(Request $request)
    {
        $data=Comment::validateComments($request);
        $comment=Comment::create($data);
        Comment::associateComments($comment, $data);
        return redirect('/post-comments/'. $comment->id);
    }

}
