<?php

namespace App\Http\Controllers;

use App\Models\GtrGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $modelId = $request->input('model_id');

        $query = GtrGallery::with('gtrModel');

        if ($modelId) {
            $query->where('gtr_model_id', $modelId);
        }

        $images = $query->latest()->paginate(18);
        $models = \App\Models\GtrModel::active()->orderBy('name')->get();

        return view('gallery.index', compact('images', 'models', 'modelId'));
    }
}
