<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\CatalogueStoreRequest;
use App\Http\Requests\EtimXchange\CatalogueUpdateRequest;
use App\Models\Catalogue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogueController extends Controller
{
    public function index(Request $request): Response
    {
        $catalogues = Catalogue::all();

        return view('catalogue.index', compact('catalogues'));
    }

    public function create(Request $request): Response
    {
        return view('catalogue.create');
    }

    public function store(CatalogueStoreRequest $request): Response
    {
        $catalogue = Catalogue::create($request->validated());

        $request->session()->flash('catalogue.id', $catalogue->id);

        return redirect()->route('catalogue.index');
    }

    public function show(Request $request, Catalogue $catalogue): Response
    {
        return view('catalogue.show', compact('catalogue'));
    }

    public function edit(Request $request, Catalogue $catalogue): Response
    {
        return view('catalogue.edit', compact('catalogue'));
    }

    public function update(CatalogueUpdateRequest $request, Catalogue $catalogue): Response
    {
        $catalogue->update($request->validated());

        $request->session()->flash('catalogue.id', $catalogue->id);

        return redirect()->route('catalogue.index');
    }

    public function destroy(Request $request, Catalogue $catalogue): Response
    {
        $catalogue->delete();

        return redirect()->route('catalogue.index');
    }
}
