<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\EnclosedTradeItemStoreRequest;
use App\Http\Requests\EtimXchange\EnclosedTradeItemUpdateRequest;
use App\Models\EtimXchange\EnclosedTradeItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnclosedTradeItemController extends Controller
{
    public function index(Request $request): Response
    {
        $enclosedTradeItems = EnclosedTradeItem::all();

        return view('enclosedTradeItem.index', compact('enclosedTradeItems'));
    }

    public function create(Request $request): Response
    {
        return view('enclosedTradeItem.create');
    }

    public function store(EnclosedTradeItemStoreRequest $request): Response
    {
        $enclosedTradeItem = EnclosedTradeItem::create($request->validated());

        $request->session()->flash('enclosedTradeItem.id', $enclosedTradeItem->id);

        return redirect()->route('enclosedTradeItem.index');
    }

    public function show(Request $request, EnclosedTradeItem $enclosedTradeItem): Response
    {
        return view('enclosedTradeItem.show', compact('enclosedTradeItem'));
    }

    public function edit(Request $request, EnclosedTradeItem $enclosedTradeItem): Response
    {
        return view('enclosedTradeItem.edit', compact('enclosedTradeItem'));
    }

    public function update(EnclosedTradeItemUpdateRequest $request, EnclosedTradeItem $enclosedTradeItem): Response
    {
        $enclosedTradeItem->update($request->validated());

        $request->session()->flash('enclosedTradeItem.id', $enclosedTradeItem->id);

        return redirect()->route('enclosedTradeItem.index');
    }

    public function destroy(Request $request, EnclosedTradeItem $enclosedTradeItem): Response
    {
        $enclosedTradeItem->delete();

        return redirect()->route('enclosedTradeItem.index');
    }
}
