<?php

namespace App\Http\Controllers;

use App\Models\GtrModel;
use Illuminate\Http\Request;

class GtrComparisonController extends Controller
{
    public function index(Request $request)
    {
        $ids = $request->input('models', []);
        $compareModels = collect();

        if (!empty($ids)) {
            $compareModels = GtrModel::active()
                ->whereIn('id', $ids)
                ->get();
        }

        $allModels = GtrModel::active()->orderBy('name')->get();

        return view('gtr.compare', compact('compareModels', 'allModels'));
    }
}
