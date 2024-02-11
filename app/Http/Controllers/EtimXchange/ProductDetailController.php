<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ProductDetailStoreRequest;
use App\Http\Requests\EtimXchange\ProductDetailUpdateRequest;
use App\Models\EtimXchange\ProductDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductDetailController extends Controller
{
    public function index(Request $request): Response
    {
        $productDetails = ProductDetail::all();

        return view('productDetail.index', compact('productDetails'));
    }

    public function create(Request $request): Response
    {
        return view('productDetail.create');
    }

    public function store(ProductDetailStoreRequest $request): Response
    {
        $productDetail = ProductDetail::create($request->validated());

        $request->session()->flash('productDetail.id', $productDetail->id);

        return redirect()->route('productDetail.index');
    }

    public function show(Request $request, ProductDetail $productDetail): Response
    {
        return view('productDetail.show', compact('productDetail'));
    }

    public function edit(Request $request, ProductDetail $productDetail): Response
    {
        return view('productDetail.edit', compact('productDetail'));
    }

    public function update(ProductDetailUpdateRequest $request, ProductDetail $productDetail): Response
    {
        $productDetail->update($request->validated());

        $request->session()->flash('productDetail.id', $productDetail->id);

        return redirect()->route('productDetail.index');
    }

    public function destroy(Request $request, ProductDetail $productDetail): Response
    {
        $productDetail->delete();

        return redirect()->route('productDetail.index');
    }
}
