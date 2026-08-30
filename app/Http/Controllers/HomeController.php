<?php

namespace App\Http\Controllers;

use App\Models\GtrModel;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredModels = GtrModel::active()->featured()->with('approvedReviews')->limit(3)->get();
        $latestModels = GtrModel::active()->latest()->with('approvedReviews')->limit(4)->get();
        $latestReviews = Review::approved()->with(['user', 'gtrModel'])->latest()->limit(5)->get();
        $nismoModels = GtrModel::active()->nismo()->with('approvedReviews')->limit(3)->get();
        $generations = GtrModel::active()->select('generation')->distinct()->pluck('generation');
        $totalModels = GtrModel::active()->count();
        $totalHorsepower = GtrModel::active()->max('horsepower');

        return view('home', compact(
            'featuredModels',
            'latestModels',
            'latestReviews',
            'nismoModels',
            'generations',
            'totalModels',
            'totalHorsepower'
        ));
    }
}
