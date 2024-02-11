<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ClassificationFeatureStoreRequest;
use App\Http\Requests\EtimXchange\ClassificationFeatureUpdateRequest;
use App\Models\EtimXchange\ClassificationFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassificationFeatureController extends Controller
{
    public function index(Request $request): Response
    {
        $classificationFeatures = ClassificationFeature::all();

        return view('classificationFeature.index', compact('classificationFeatures'));
    }

    public function create(Request $request): Response
    {
        return view('classificationFeature.create');
    }

    public function store(ClassificationFeatureStoreRequest $request): Response
    {
        $classificationFeature = ClassificationFeature::create($request->validated());

        $request->session()->flash('classificationFeature.id', $classificationFeature->id);

        return redirect()->route('classificationFeature.index');
    }

    public function show(Request $request, ClassificationFeature $classificationFeature): Response
    {
        return view('classificationFeature.show', compact('classificationFeature'));
    }

    public function edit(Request $request, ClassificationFeature $classificationFeature): Response
    {
        return view('classificationFeature.edit', compact('classificationFeature'));
    }

    public function update(ClassificationFeatureUpdateRequest $request, ClassificationFeature $classificationFeature): Response
    {
        $classificationFeature->update($request->validated());

        $request->session()->flash('classificationFeature.id', $classificationFeature->id);

        return redirect()->route('classificationFeature.index');
    }

    public function destroy(Request $request, ClassificationFeature $classificationFeature): Response
    {
        $classificationFeature->delete();

        return redirect()->route('classificationFeature.index');
    }
}
