<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ItemDetailStoreRequest;
use App\Http\Requests\EtimXchange\ItemDetailUpdateRequest;
use App\Models\EtimXchange\ItemDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemDetailController extends Controller
{
    public function index(Request $request): Response
    {
        $itemDetails = ItemDetail::all();

        return view('itemDetail.index', compact('itemDetails'));
    }

    public function create(Request $request): Response
    {
        return view('itemDetail.create');
    }

    public function store(ItemDetailStoreRequest $request): Response
    {
        $itemDetail = ItemDetail::create($request->validated());

        $request->session()->flash('itemDetail.id', $itemDetail->id);

        return redirect()->route('itemDetail.index');
    }

    public function show(Request $request, ItemDetail $itemDetail): Response
    {
        return view('itemDetail.show', compact('itemDetail'));
    }

    public function edit(Request $request, ItemDetail $itemDetail): Response
    {
        return view('itemDetail.edit', compact('itemDetail'));
    }

    public function update(ItemDetailUpdateRequest $request, ItemDetail $itemDetail): Response
    {
        $itemDetail->update($request->validated());

        $request->session()->flash('itemDetail.id', $itemDetail->id);

        return redirect()->route('itemDetail.index');
    }

    public function destroy(Request $request, ItemDetail $itemDetail): Response
    {
        $itemDetail->delete();

        return redirect()->route('itemDetail.index');
    }
}
