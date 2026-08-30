<?php

namespace App\Http\Controllers;

use App\Models\GtrModel;
use Illuminate\Http\Request;

class GtrController extends Controller
{
    public function index(Request $request)
    {
        $query = GtrModel::active()->with('approvedReviews');

        $query->search($request->input('search'));
        $query->filterGeneration($request->input('generation'));
        $query->filterYear($request->input('year'));
        $query->filterHorsepower($request->input('min_hp'), $request->input('max_hp'));

        $sortBy = $request->input('sort', 'name');
        $sortDir = $request->input('direction', 'asc');

        $allowedSorts = ['name', 'horsepower', 'year_start', 'price'];
        if (in_array($sortBy, $allowedSorts)) {
            if ($sortBy === 'price') {
                $query->orderByRaw("CAST(REPLACE(REPLACE(price, '$', ''), ',', '') AS UNSIGNED) {$sortDir}");
            } else {
                $query->orderBy($sortBy, $sortDir);
            }
        } else {
            $query->orderBy('name', 'asc');
        }

        $models = $query->paginate(9)->withQueryString();
        $generations = GtrModel::active()->select('generation')->distinct()->pluck('generation');
        $years = GtrModel::active()->select('year_start')->distinct()->orderBy('year_start')->pluck('year_start');

        return view('gtr.index', compact('models', 'generations', 'years'));
    }

    public function show(GtrModel $gtrModel)
    {
        $gtrModel->load(['galleries', 'approvedReviews' => function ($query) {
            $query->latest();
        }, 'approvedReviews.user']);

        $similarModels = GtrModel::active()
            ->where('id', '!=', $gtrModel->id)
            ->where('generation', $gtrModel->generation)
            ->with('approvedReviews')
            ->limit(3)
            ->get();

        if ($similarModels->count() < 3) {
            $moreModels = GtrModel::active()
                ->where('id', '!=', $gtrModel->id)
                ->whereNotIn('id', $similarModels->pluck('id'))
                ->with('approvedReviews')
                ->limit(3 - $similarModels->count())
                ->get();
            $similarModels = $similarModels->concat($moreModels);
        }

        $isFavorited = false;
        if (auth()->check()) {
            $isFavorited = auth()->user()->favorites()->where('gtr_model_id', $gtrModel->id)->exists();
        }

        return view('gtr.show', compact('gtrModel', 'similarModels', 'isFavorited'));
    }

    public function history()
    {
        $generations = GtrModel::active()
            ->with('approvedReviews')
            ->orderBy('year_start')
            ->get()
            ->groupBy('generation');

        return view('gtr.history', compact('generations'));
    }
}
