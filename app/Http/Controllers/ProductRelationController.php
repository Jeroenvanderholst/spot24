<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ProductRelationStoreRequest;
use App\Http\Requests\EtimXchange\ProductRelationUpdateRequest;
use App\Models\ProductRelation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductRelationController extends Controller
{
    public function index(Request $request): Response
    {
        $productRelations = ProductRelation::all();

        return view('productRelation.index', compact('productRelations'));
    }

    public function create(Request $request): Response
    {
        return view('productRelation.create');
    }

    public function store(ProductRelationStoreRequest $request): Response
    {
        $productRelation = ProductRelation::create($request->validated());

        $request->session()->flash('productRelation.id', $productRelation->id);

        return redirect()->route('productRelation.index');
    }

    public function show(Request $request, ProductRelation $productRelation): Response
    {
        return view('productRelation.show', compact('productRelation'));
    }

    public function edit(Request $request, ProductRelation $productRelation): Response
    {
        return view('productRelation.edit', compact('productRelation'));
    }

    public function update(ProductRelationUpdateRequest $request, ProductRelation $productRelation): Response
    {
        $productRelation->update($request->validated());

        $request->session()->flash('productRelation.id', $productRelation->id);

        return redirect()->route('productRelation.index');
    }

    public function destroy(Request $request, ProductRelation $productRelation): Response
    {
        $productRelation->delete();

        return redirect()->route('productRelation.index');
    }
}
