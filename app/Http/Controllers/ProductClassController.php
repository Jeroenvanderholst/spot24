<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ProductClassStoreRequest;
use App\Http\Requests\Etim\ProductClassUpdateRequest;
use App\Models\ProductClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductClassController extends Controller
{
    public function index(Request $request): Response
    {
        $productClasses = ProductClass::all();

        return view('productClass.index', compact('productClasses'));
    }

    public function create(Request $request): Response
    {
        return view('productClass.create');
    }

    public function store(ProductClassStoreRequest $request): Response
    {
        $productClass = ProductClass::create($request->validated());

        $request->session()->flash('productClass.id', $productClass->id);

        return redirect()->route('productClass.index');
    }

    public function show(Request $request, ProductClass $productClass): Response
    {
        return view('productClass.show', compact('productClass'));
    }

    public function edit(Request $request, ProductClass $productClass): Response
    {
        return view('productClass.edit', compact('productClass'));
    }

    public function update(ProductClassUpdateRequest $request, ProductClass $productClass): Response
    {
        $productClass->update($request->validated());

        $request->session()->flash('productClass.id', $productClass->id);

        return redirect()->route('productClass.index');
    }

    public function destroy(Request $request, ProductClass $productClass): Response
    {
        $productClass->delete();

        return redirect()->route('productClass.index');
    }
}
