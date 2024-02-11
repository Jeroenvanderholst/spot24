<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\EtimModellingFeatureStoreRequest;
use App\Http\Requests\EtimXchange\EtimModellingFeatureUpdateRequest;
use App\Models\EtimXchange\EtimModellingFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtimModellingFeatureController extends Controller
{
    public function index(Request $request): Response
    {
        $etimModellingFeatures = EtimModellingFeature::all();

        return view('etimModellingFeature.index', compact('etimModellingFeatures'));
    }

    public function create(Request $request): Response
    {
        return view('etimModellingFeature.create');
    }

    public function store(EtimModellingFeatureStoreRequest $request): Response
    {
        $etimModellingFeature = EtimModellingFeature::create($request->validated());

        $request->session()->flash('etimModellingFeature.id', $etimModellingFeature->id);

        return redirect()->route('etimModellingFeature.index');
    }

    public function show(Request $request, EtimModellingFeature $etimModellingFeature): Response
    {
        return view('etimModellingFeature.show', compact('etimModellingFeature'));
    }

    public function edit(Request $request, EtimModellingFeature $etimModellingFeature): Response
    {
        return view('etimModellingFeature.edit', compact('etimModellingFeature'));
    }

    public function update(EtimModellingFeatureUpdateRequest $request, EtimModellingFeature $etimModellingFeature): Response
    {
        $etimModellingFeature->update($request->validated());

        $request->session()->flash('etimModellingFeature.id', $etimModellingFeature->id);

        return redirect()->route('etimModellingFeature.index');
    }

    public function destroy(Request $request, EtimModellingFeature $etimModellingFeature): Response
    {
        $etimModellingFeature->delete();

        return redirect()->route('etimModellingFeature.index');
    }
}
