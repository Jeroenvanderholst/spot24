<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\EtimLanguageStoreRequest;
use App\Http\Requests\Etim\EtimLanguageUpdateRequest;
use App\Models\Etim\EtimLanguage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtimLanguageController extends Controller
{
    public function index(Request $request): Response
    {
        $etimlanguages = EtimLanguage::all();

        return view('etimlanguage.index', compact('etimlanguages'));
    }

    public function create(Request $request): Response
    {
        return view('etimlanguage.create');
    }

    public function store(EtimLanguageStoreRequest $request): Response
    {
        $etimlanguage = EtimLanguage::create($request->validated());

        $request->session()->flash('etimlanguage.id', $etimlanguage->id);

        return redirect()->route('etimlanguage.index');
    }

    public function show(Request $request, EtimLanguage $etimlanguage): Response
    {
        return view('etimlanguage.show', compact('etimlanguage'));
    }

    public function edit(Request $request, EtimLanguage $language): Response
    {
        return view('etimlanguage.edit', compact('etimlanguage'));
    }

    public function update(EtimLanguageUpdateRequest $request, EtimLanguage $language): Response
    {
        $language->update($request->validated());

        $request->session()->flash('etimlanguage.id', $language->id);

        return redirect()->route('etimlanguage.index');
    }

    public function destroy(Request $request, EtimLanguage $etimlanguage): Response
    {
        $etimlanguage->delete();

        return redirect()->route('etimlanguage.index');
    }
}
