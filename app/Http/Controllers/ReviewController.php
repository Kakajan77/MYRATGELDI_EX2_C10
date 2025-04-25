<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::all();
        return view('reviews.index', ['reviews' => $review]);

    }
}
