<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class PostReviewsController extends Controller
{
    //
    
    public function store(Request $request)
    {
        $data=Review::validateReviewDetails($request);
        $review=Review::create($data);
        Review::associateReview($data, $review);
        return redirect('/post-reviews/'.$review->id);
    }


}
