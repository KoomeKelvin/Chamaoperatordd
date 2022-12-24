<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class DutyReviewsController extends Controller
{
    //
    public function store(Request $request)
    {
        $data=Review::validateReviewDetails($request);
         $review=Review::create($data);
        Review::associateReview($data, $review);
        return redirect('/duty-reviews/'.$review->id);
    }

}
