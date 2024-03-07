<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ProductCountrySpecificFieldStoreRequest;
use App\Http\Requests\EtimXchange\ProductCountrySpecificFieldUpdateRequest;
use App\Models\ProductCountrySpecificField;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductCountrySpecificFieldController extends Controller
{
    public function index(Request $request): Response
    {
        $productCountrySpecificFields = ProductCountrySpecificField::all();

        return view('productCountrySpecificField.index', compact('productCountrySpecificFields'));
    }

    public function create(Request $request): Response
    {
        return view('productCountrySpecificField.create');
    }

    public function store(ProductCountrySpecificFieldStoreRequest $request): Response
    {
        $productCountrySpecificField = ProductCountrySpecificField::create($request->validated());

        $request->session()->flash('productCountrySpecificField.id', $productCountrySpecificField->id);

        return redirect()->route('productCountrySpecificField.index');
    }

    public function show(Request $request, ProductCountrySpecificField $productCountrySpecificField): Response
    {
        return view('productCountrySpecificField.show', compact('productCountrySpecificField'));
    }

    public function edit(Request $request, ProductCountrySpecificField $productCountrySpecificField): Response
    {
        return view('productCountrySpecificField.edit', compact('productCountrySpecificField'));
    }

    public function update(ProductCountrySpecificFieldUpdateRequest $request, ProductCountrySpecificField $productCountrySpecificField): Response
    {
        $productCountrySpecificField->update($request->validated());

        $request->session()->flash('productCountrySpecificField.id', $productCountrySpecificField->id);

        return redirect()->route('productCountrySpecificField.index');
    }

    public function destroy(Request $request, ProductCountrySpecificField $productCountrySpecificField): Response
    {
        $productCountrySpecificField->delete();

        return redirect()->route('productCountrySpecificField.index');
    }
}
