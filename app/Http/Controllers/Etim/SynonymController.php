<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\SynonymStoreRequest;
use App\Http\Requests\Etim\SynonymUpdateRequest;
use App\Models\Etim\Synonym;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SynonymController extends Controller
{
    public function index(Request $request): Response
    {
        $synonyms = Synonym::all();

        return view('synonym.index', compact('synonyms'));
    }

    public function create(Request $request): Response
    {
        return view('synonym.create');
    }

    public function store(SynonymStoreRequest $request): Response
    {
        $synonym = Synonym::create($request->validated());

        $request->session()->flash('synonym.id', $synonym->id);

        return redirect()->route('synonym.index');
    }

    public function show(Request $request, Synonym $synonym): Response
    {
        return view('synonym.show', compact('synonym'));
    }

    public function edit(Request $request, Synonym $synonym): Response
    {
        return view('synonym.edit', compact('synonym'));
    }

    public function update(SynonymUpdateRequest $request, Synonym $synonym): Response
    {
        $synonym->update($request->validated());

        $request->session()->flash('synonym.id', $synonym->id);

        return redirect()->route('synonym.index');
    }

    public function destroy(Request $request, Synonym $synonym): Response
    {
        $synonym->delete();

        return redirect()->route('synonym.index');
    }
}
