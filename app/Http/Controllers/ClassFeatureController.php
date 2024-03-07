<?php

namespace App\Http\Controllers;

use App\Etim\ClassFeature;
use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ClassFeatureStoreRequest;
use App\Http\Requests\Etim\ClassFeatureUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassFeatureController extends Controller
{
    public function index(Request $request): Response
    {
        $classFeatures = ClassFeature::all();

        return view('classFeature.index', compact('classFeatures'));
    }

    public function create(Request $request): Response
    {
        return view('classFeature.create');
    }

    public function store(ClassFeatureStoreRequest $request): Response
    {
        $classFeature = ClassFeature::create($request->validated());

        $request->session()->flash('classFeature.id', $classFeature->id);

        return redirect()->route('classFeature.index');
    }

    public function show(Request $request, ClassFeature $classFeature): Response
    {
        return view('classFeature.show', compact('classFeature'));
    }

    public function edit(Request $request, ClassFeature $classFeature): Response
    {
        return view('classFeature.edit', compact('classFeature'));
    }

    public function update(ClassFeatureUpdateRequest $request, ClassFeature $classFeature): Response
    {
        $classFeature->update($request->validated());

        $request->session()->flash('classFeature.id', $classFeature->id);

        return redirect()->route('classFeature.index');
    }

    public function destroy(Request $request, ClassFeature $classFeature): Response
    {
        $classFeature->delete();

        return redirect()->route('classFeature.index');
    }
}
