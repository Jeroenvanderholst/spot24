<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ProductDescriptionStoreRequest;
use App\Http\Requests\EtimXchange\ProductDescriptionUpdateRequest;
use App\Models\EtimXchange\ProductDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductDescriptionController extends Controller
{
    public function index(Request $request): Response
    {
        $productDescriptions = ProductDescription::all();

        return view('productDescription.index', compact('productDescriptions'));
    }

    public function create(Request $request): Response
    {
        return view('productDescription.create');
    }

    public function store(ProductDescriptionStoreRequest $request): Response
    {
        $productDescription = ProductDescription::create($request->validated());

        $request->session()->flash('productDescription.id', $productDescription->id);

        return redirect()->route('productDescription.index');
    }

    public function show(Request $request, ProductDescription $productDescription): Response
    {
        return view('productDescription.show', compact('productDescription'));
    }

    public function edit(Request $request, ProductDescription $productDescription): Response
    {
        return view('productDescription.edit', compact('productDescription'));
    }

    public function update(ProductDescriptionUpdateRequest $request, ProductDescription $productDescription): Response
    {
        $productDescription->update($request->validated());

        $request->session()->flash('productDescription.id', $productDescription->id);

        return redirect()->route('productDescription.index');
    }

    public function destroy(Request $request, ProductDescription $productDescription): Response
    {
        $productDescription->delete();

        return redirect()->route('productDescription.index');
    }
}
