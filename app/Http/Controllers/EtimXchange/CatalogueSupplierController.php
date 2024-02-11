<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\CatalogueSupplierStoreRequest;
use App\Http\Requests\EtimXchange\CatalogueSupplierUpdateRequest;
use App\Models\EtimXchange\CatalogueSupplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogueSupplierController extends Controller
{
    public function index(Request $request): Response
    {
        $catalogueSuppliers = CatalogueSupplier::all();

        return view('catalogueSupplier.index', compact('catalogueSuppliers'));
    }

    public function create(Request $request): Response
    {
        return view('catalogueSupplier.create');
    }

    public function store(CatalogueSupplierStoreRequest $request): Response
    {
        $catalogueSupplier = CatalogueSupplier::create($request->validated());

        $request->session()->flash('catalogueSupplier.id', $catalogueSupplier->id);

        return redirect()->route('catalogueSupplier.index');
    }

    public function show(Request $request, CatalogueSupplier $catalogueSupplier): Response
    {
        return view('catalogueSupplier.show', compact('catalogueSupplier'));
    }

    public function edit(Request $request, CatalogueSupplier $catalogueSupplier): Response
    {
        return view('catalogueSupplier.edit', compact('catalogueSupplier'));
    }

    public function update(CatalogueSupplierUpdateRequest $request, CatalogueSupplier $catalogueSupplier): Response
    {
        $catalogueSupplier->update($request->validated());

        $request->session()->flash('catalogueSupplier.id', $catalogueSupplier->id);

        return redirect()->route('catalogueSupplier.index');
    }

    public function destroy(Request $request, CatalogueSupplier $catalogueSupplier): Response
    {
        $catalogueSupplier->delete();

        return redirect()->route('catalogueSupplier.index');
    }
}
