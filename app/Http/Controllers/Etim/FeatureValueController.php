<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\FeatureValueStoreRequest;
use App\Http\Requests\Etim\FeatureValueUpdateRequest;
use App\Models\Etim\FeatureValue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureValueController extends Controller
{
    public function index(Request $request): Response
    {
        $featureValues = FeatureValue::all();

        return view('featureValue.index', compact('featureValues'));
    }

    public function create(Request $request): Response
    {
        return view('featureValue.create');
    }

    public function store(FeatureValueStoreRequest $request): Response
    {
        $featureValue = FeatureValue::create($request->validated());

        $request->session()->flash('featureValue.id', $featureValue->id);

        return redirect()->route('featureValue.index');
    }

    public function show(Request $request, FeatureValue $featureValue): Response
    {
        return view('featureValue.show', compact('featureValue'));
    }

    public function edit(Request $request, FeatureValue $featureValue): Response
    {
        return view('featureValue.edit', compact('featureValue'));
    }

    public function update(FeatureValueUpdateRequest $request, FeatureValue $featureValue): Response
    {
        $featureValue->update($request->validated());

        $request->session()->flash('featureValue.id', $featureValue->id);

        return redirect()->route('featureValue.index');
    }

    public function destroy(Request $request, FeatureValue $featureValue): Response
    {
        $featureValue->delete();

        return redirect()->route('featureValue.index');
    }
}
