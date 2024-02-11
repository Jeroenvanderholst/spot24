<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\OtherClassificationStoreRequest;
use App\Http\Requests\EtimXchange\OtherClassificationUpdateRequest;
use App\Models\EtimXchange\OtherClassification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OtherClassificationController extends Controller
{
    public function index(Request $request): Response
    {
        $otherClassifications = OtherClassification::all();

        return view('otherClassification.index', compact('otherClassifications'));
    }

    public function create(Request $request): Response
    {
        return view('otherClassification.create');
    }

    public function store(OtherClassificationStoreRequest $request): Response
    {
        $otherClassification = OtherClassification::create($request->validated());

        $request->session()->flash('otherClassification.id', $otherClassification->id);

        return redirect()->route('otherClassification.index');
    }

    public function show(Request $request, OtherClassification $otherClassification): Response
    {
        return view('otherClassification.show', compact('otherClassification'));
    }

    public function edit(Request $request, OtherClassification $otherClassification): Response
    {
        return view('otherClassification.edit', compact('otherClassification'));
    }

    public function update(OtherClassificationUpdateRequest $request, OtherClassification $otherClassification): Response
    {
        $otherClassification->update($request->validated());

        $request->session()->flash('otherClassification.id', $otherClassification->id);

        return redirect()->route('otherClassification.index');
    }

    public function destroy(Request $request, OtherClassification $otherClassification): Response
    {
        $otherClassification->delete();

        return redirect()->route('otherClassification.index');
    }
}
