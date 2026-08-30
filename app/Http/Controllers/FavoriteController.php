<?php

namespace App\Http\Controllers;

use App\Models\GtrModel;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Request $request, GtrModel $gtrModel)
    {
        $user = auth()->user();
        $existing = $user->favorites()->where('gtr_model_id', $gtrModel->id)->first();

        if ($existing) {
            $existing->delete();
            $message = 'Removed from favorites';
        } else {
            $user->favorites()->create(['gtr_model_id' => $gtrModel->id]);
            $message = 'Added to favorites';
        }

        if ($request->ajax()) {
            return response()->json(['favorited' => !$existing, 'message' => $message]);
        }

        return redirect()->back()->with('success', $message);
    }

    public function index()
    {
        $favorites = auth()->user()
            ->favorites()
            ->with('gtrModel.approvedReviews')
            ->latest()
            ->paginate(12);

        return view('favorites.index', compact('favorites'));
    }
}
