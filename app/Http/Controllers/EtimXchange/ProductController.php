<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ProductStoreRequest;
use App\Http\Requests\EtimXchange\ProductUpdateRequest;
use App\Models\EtimXchange\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): Response
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create(Request $request): Response
    {
        return view('product.create');
    }

    public function store(ProductStoreRequest $request): Response
    {
        $product = Product::create($request->validated());

        $request->session()->flash('product.id', $product->id);

        return redirect()->route('product.index');
    }

    public function show(Request $request, Product $product): Response
    {
        return view('product.show', compact('product'));
    }

    public function edit(Request $request, Product $product): Response
    {
        return view('product.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product): Response
    {
        $product->update($request->validated());

        $request->session()->flash('product.id', $product->id);

        return redirect()->route('product.index');
    }

    public function destroy(Request $request, Product $product): Response
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
