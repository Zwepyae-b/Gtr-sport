<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['user', 'gtrModel']);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $reviews = $query->latest()->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function approve(Review $review)
    {
        $review->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Review approved!');
    }

    public function reject(Review $review)
    {
        $review->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Review rejected!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted!');
    }
}
