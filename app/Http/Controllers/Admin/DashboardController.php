<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GtrModel;
use App\Models\Review;
use App\Models\User;
use App\Models\Favorite;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_models' => GtrModel::count(),
            'total_users' => User::count(),
            'total_reviews' => Review::count(),
            'total_favorites' => Favorite::count(),
            'pending_reviews' => Review::where('status', 'pending')->count(),
            'active_models' => GtrModel::where('status', 'active')->count(),
        ];

        $recentReviews = Review::with(['user', 'gtrModel'])->latest()->limit(5)->get();
        $recentUsers = User::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentReviews', 'recentUsers'));
    }
}
