<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\EtimClassificationStoreRequest;
use App\Http\Requests\EtimXchange\EtimClassificationUpdateRequest;
use App\ModelsClassification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtimClassificationController extends Controller
{
    public function index(Request $request): Response
    {
        $etimClassifications = EtimClassification::all();

        return view('etimClassification.index', compact('etimClassifications'));
    }

    public function create(Request $request): Response
    {
        return view('etimClassification.create');
    }

    public function store(EtimClassificationStoreRequest $request): Response
    {
        $etimClassification = EtimClassification::create($request->validated());

        $request->session()->flash('etimClassification.id', $etimClassification->id);

        return redirect()->route('etimClassification.index');
    }

    public function show(Request $request, EtimClassification $etimClassification): Response
    {
        return view('etimClassification.show', compact('etimClassification'));
    }

    public function edit(Request $request, EtimClassification $etimClassification): Response
    {
        return view('etimClassification.edit', compact('etimClassification'));
    }

    public function update(EtimClassificationUpdateRequest $request, EtimClassification $etimClassification): Response
    {
        $etimClassification->update($request->validated());

        $request->session()->flash('etimClassification.id', $etimClassification->id);

        return redirect()->route('etimClassification.index');
    }

    public function destroy(Request $request, EtimClassification $etimClassification): Response
    {
        $etimClassification->delete();

        return redirect()->route('etimClassification.index');
    }
}
