<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\UnitTranslationStoreRequest;
use App\Http\Requests\Etim\UnitTranslationUpdateRequest;
use App\Models\Etim\UnitTranslation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitTranslationController extends Controller
{
    public function index(Request $request): Response
    {
        $unitTranslations = UnitTranslation::all();

        return view('unitTranslation.index', compact('unitTranslations'));
    }

    public function create(Request $request): Response
    {
        return view('unitTranslation.create');
    }

    public function store(UnitTranslationStoreRequest $request): Response
    {
        $unitTranslation = UnitTranslation::create($request->validated());

        $request->session()->flash('unitTranslation.id', $unitTranslation->id);

        return redirect()->route('unitTranslation.index');
    }

    public function show(Request $request, UnitTranslation $unitTranslation): Response
    {
        return view('unitTranslation.show', compact('unitTranslation'));
    }

    public function edit(Request $request, UnitTranslation $unitTranslation): Response
    {
        return view('unitTranslation.edit', compact('unitTranslation'));
    }

    public function update(UnitTranslationUpdateRequest $request, UnitTranslation $unitTranslation): Response
    {
        $unitTranslation->update($request->validated());

        $request->session()->flash('unitTranslation.id', $unitTranslation->id);

        return redirect()->route('unitTranslation.index');
    }

    public function destroy(Request $request, UnitTranslation $unitTranslation): Response
    {
        $unitTranslation->delete();

        return redirect()->route('unitTranslation.index');
    }
}
