<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GtrModel;
use App\Models\GtrGallery;
use App\Http\Requests\CreateGtrRequest;
use App\Http\Requests\UpdateGtrRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GtrController extends Controller
{
    public function index(Request $request)
    {
        $query = GtrModel::with('galleries');

        if ($request->search) {
            $query->search($request->search);
        }

        $models = $query->latest()->paginate(15);
        return view('admin.gtr.index', compact('models'));
    }

    public function create()
    {
        return view('admin.gtr.create');
    }

    public function store(CreateGtrRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('gtr', 'public');
        }

        GtrModel::create($data);

        return redirect()->route('admin.gtr.index')->with('success', 'GT-R model created successfully!');
    }

    public function edit(GtrModel $gtrModel)
    {
        $gtrModel->load('galleries');
        return view('admin.gtr.edit', compact('gtrModel'));
    }

    public function update(UpdateGtrRequest $request, GtrModel $gtrModel)
    {
        $data = $request->validated();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('gtr', 'public');
        }

        $gtrModel->update($data);

        return redirect()->route('admin.gtr.index')->with('success', 'GT-R model updated successfully!');
    }

    public function destroy(GtrModel $gtrModel)
    {
        $gtrModel->delete();
        return redirect()->route('admin.gtr.index')->with('success', 'GT-R model deleted successfully!');
    }

    public function uploadGallery(Request $request, GtrModel $gtrModel)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|max:5120',
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('gtr', 'public');
                $caption = $request->captions[$index] ?? null;

                GtrGallery::create([
                    'gtr_model_id' => $gtrModel->id,
                    'image' => $path,
                    'caption' => $caption,
                ]);
            }
        }

        return redirect()->route('admin.gtr.edit', $gtrModel)->with('success', 'Gallery images uploaded successfully!');
    }

    public function destroyGallery(GtrGallery $gallery)
    {
        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery image deleted successfully!');
    }
}
