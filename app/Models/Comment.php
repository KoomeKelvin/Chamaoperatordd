<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function commentable()
    {
        return $this->morphTo();
    }


    /**
     * Custom actions to refactor code from the comments controllers
     */
    
    public static function validateComments(Request $request)
    {
        return $request->validate([
            'commentable_id'=>'required|max:255',
            'commentable_type'=>'required|max:255',
            'description'=>'required'
            
        ]);
    }
    
    public static function associateComments($comment, $data)
    {
        $comment->commentable->save($data);
    }
}
