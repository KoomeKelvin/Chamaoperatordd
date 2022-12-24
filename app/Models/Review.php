<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Review extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function reviewable()
    {
        return $this->morphTo();
    }

     /**
     * Custom actions to refactor code on ReviewController
     */
    public static function validateReviewDetails(Request $request)
    {
        return $request->validate(
         [
            'reviewable_id'=>'required|max:255',
            'reviewable_type'=>'required|max:255',
            'rating'=>'required|max:3'
        ]
         );
    }

    public static function associateReview($data, $review)
    {
        $review->reviewable()->save($data);
    }
}
