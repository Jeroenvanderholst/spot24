<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\EtimFeatureStoreRequest;
use App\Http\Requests\EtimXchange\EtimFeatureUpdateRequest;
use App\Models\EtimXchange\EtimFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtimFeatureController extends Controller
{
    public function index(Request $request): Response
    {
        $etimFeatures = EtimFeature::all();

        return view('etimFeature.index', compact('etimFeatures'));
    }

    public function create(Request $request): Response
    {
        return view('etimFeature.create');
    }

    public function store(EtimFeatureStoreRequest $request): Response
    {
        $etimFeature = EtimFeature::create($request->validated());

        $request->session()->flash('etimFeature.id', $etimFeature->id);

        return redirect()->route('etimFeature.index');
    }

    public function show(Request $request, EtimFeature $etimFeature): Response
    {
        return view('etimFeature.show', compact('etimFeature'));
    }

    public function edit(Request $request, EtimFeature $etimFeature): Response
    {
        return view('etimFeature.edit', compact('etimFeature'));
    }

    public function update(EtimFeatureUpdateRequest $request, EtimFeature $etimFeature): Response
    {
        $etimFeature->update($request->validated());

        $request->session()->flash('etimFeature.id', $etimFeature->id);

        return redirect()->route('etimFeature.index');
    }

    public function destroy(Request $request, EtimFeature $etimFeature): Response
    {
        $etimFeature->delete();

        return redirect()->route('etimFeature.index');
    }
}
