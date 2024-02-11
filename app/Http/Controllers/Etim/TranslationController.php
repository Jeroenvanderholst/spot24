<?php

namespace App\Http\Controllers\Etim;

use App\Etim\Translation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\TranslationStoreRequest;
use App\Http\Requests\Etim\TranslationUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TranslationController extends Controller
{
    public function index(Request $request): Response
    {
        $translations = Translation::all();

        return view('translation.index', compact('translations'));
    }

    public function create(Request $request): Response
    {
        return view('translation.create');
    }

    public function store(TranslationStoreRequest $request): Response
    {
        $translation = Translation::create($request->validated());

        $request->session()->flash('translation.id', $translation->id);

        return redirect()->route('translation.index');
    }

    public function show(Request $request, Translation $translation): Response
    {
        return view('translation.show', compact('translation'));
    }

    public function edit(Request $request, Translation $translation): Response
    {
        return view('translation.edit', compact('translation'));
    }

    public function update(TranslationUpdateRequest $request, Translation $translation): Response
    {
        $translation->update($request->validated());

        $request->session()->flash('translation.id', $translation->id);

        return redirect()->route('translation.index');
    }

    public function destroy(Request $request, Translation $translation): Response
    {
        $translation->delete();

        return redirect()->route('translation.index');
    }
}
