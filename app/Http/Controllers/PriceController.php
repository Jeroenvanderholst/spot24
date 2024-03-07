<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\PriceStoreRequest;
use App\Http\Requests\EtimXchange\PriceUpdateRequest;
use App\Models\Price;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PriceController extends Controller
{
    public function index(Request $request): Response
    {
        $prices = Price::all();

        return view('price.index', compact('prices'));
    }

    public function create(Request $request): Response
    {
        return view('price.create');
    }

    public function store(PriceStoreRequest $request): Response
    {
        $price = Price::create($request->validated());

        $request->session()->flash('price.id', $price->id);

        return redirect()->route('price.index');
    }

    public function show(Request $request, Price $price): Response
    {
        return view('price.show', compact('price'));
    }

    public function edit(Request $request, Price $price): Response
    {
        return view('price.edit', compact('price'));
    }

    public function update(PriceUpdateRequest $request, Price $price): Response
    {
        $price->update($request->validated());

        $request->session()->flash('price.id', $price->id);

        return redirect()->route('price.index');
    }

    public function destroy(Request $request, Price $price): Response
    {
        $price->delete();

        return redirect()->route('price.index');
    }
}
