<?php

namespace App\Http\Controllers\Etim;

use App\Etim\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\FeatureStoreRequest;
use App\Http\Requests\Etim\FeatureUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(Request $request): Response
    {
        $features = Feature::all();

        return view('feature.index', compact('features'));
    }

    public function create(Request $request): Response
    {
        return view('feature.create');
    }

    public function store(FeatureStoreRequest $request): Response
    {
        $feature = Feature::create($request->validated());

        $request->session()->flash('feature.id', $feature->id);

        return redirect()->route('feature.index');
    }

    public function show(Request $request, Feature $feature): Response
    {
        return view('feature.show', compact('feature'));
    }

    public function edit(Request $request, Feature $feature): Response
    {
        return view('feature.edit', compact('feature'));
    }

    public function update(FeatureUpdateRequest $request, Feature $feature): Response
    {
        $feature->update($request->validated());

        $request->session()->flash('feature.id', $feature->id);

        return redirect()->route('feature.index');
    }

    public function destroy(Request $request, Feature $feature): Response
    {
        $feature->delete();

        return redirect()->route('feature.index');
    }
}
