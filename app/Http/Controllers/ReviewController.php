<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\GtrModel;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::approved()->with(['user', 'gtrModel']);

        if ($request->input('model_id')) {
            $query->where('gtr_model_id', $request->input('model_id'));
        }

        $reviews = $query->latest()->paginate(10);
        $models = GtrModel::active()->orderBy('name')->get();

        return view('reviews.index', compact('reviews', 'models'));
    }

    public function store(ReviewRequest $request)
    {
        Review::create([
            'user_id' => auth()->id(),
            'gtr_model_id' => $request->gtr_model_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully! It will appear after approval.');
    }

    public function edit(Review $review)
    {
        if ($review->user_id !== auth()->id()) {
            abort(403);
        }

        $models = GtrModel::active()->orderBy('name')->get();

        return view('reviews.edit', compact('review', 'models'));
    }

    public function update(ReviewRequest $request, Review $review)
    {
        if ($review->user_id !== auth()->id()) {
            abort(403);
        }

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        if ($review->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}
