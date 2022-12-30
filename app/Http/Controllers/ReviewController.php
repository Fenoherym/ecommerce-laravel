<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $review = new Review();

        $review->content = $request->content;
        $review->user_id = $request->user_id;
        $review->produit_id = $request->produit_id;
        $review->stars = $request->stars;

        $review->save();

        return back();

    }
}
