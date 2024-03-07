<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ModellingClassFeatureStoreRequest;
use App\Http\Requests\Etim\ModellingClassFeatureUpdateRequest;
use App\Models\ModellingClassFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModellingClassFeatureController extends Controller
{
    public function index(Request $request): Response
    {
        $modellingClassFeatures = ModellingClassFeature::all();

        return view('modellingClassFeature.index', compact('modellingClassFeatures'));
    }

    public function create(Request $request): Response
    {
        return view('modellingClassFeature.create');
    }

    public function store(ModellingClassFeatureStoreRequest $request): Response
    {
        $modellingClassFeature = ModellingClassFeature::create($request->validated());

        $request->session()->flash('modellingClassFeature.id', $modellingClassFeature->id);

        return redirect()->route('modellingClassFeature.index');
    }

    public function show(Request $request, ModellingClassFeature $modellingClassFeature): Response
    {
        return view('modellingClassFeature.show', compact('modellingClassFeature'));
    }

    public function edit(Request $request, ModellingClassFeature $modellingClassFeature): Response
    {
        return view('modellingClassFeature.edit', compact('modellingClassFeature'));
    }

    public function update(ModellingClassFeatureUpdateRequest $request, ModellingClassFeature $modellingClassFeature): Response
    {
        $modellingClassFeature->update($request->validated());

        $request->session()->flash('modellingClassFeature.id', $modellingClassFeature->id);

        return redirect()->route('modellingClassFeature.index');
    }

    public function destroy(Request $request, ModellingClassFeature $modellingClassFeature): Response
    {
        $modellingClassFeature->delete();

        return redirect()->route('modellingClassFeature.index');
    }
}
