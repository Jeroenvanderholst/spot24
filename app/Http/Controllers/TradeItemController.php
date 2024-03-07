<?php

namespace App\Http\Controllers;

use App\EtimXchange\TradeItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\TradeItemStoreRequest;
use App\Http\Requests\EtimXchange\TradeItemUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TradeItemController extends Controller
{
    public function index(Request $request): Response
    {
        $tradeItems = TradeItem::all();

        return view('tradeItem.index', compact('tradeItems'));
    }

    public function create(Request $request): Response
    {
        return view('tradeItem.create');
    }

    public function store(TradeItemStoreRequest $request): Response
    {
        $tradeItem = TradeItem::create($request->validated());

        $request->session()->flash('tradeItem.id', $tradeItem->id);

        return redirect()->route('tradeItem.index');
    }

    public function show(Request $request, TradeItem $tradeItem): Response
    {
        return view('tradeItem.show', compact('tradeItem'));
    }

    public function edit(Request $request, TradeItem $tradeItem): Response
    {
        return view('tradeItem.edit', compact('tradeItem'));
    }

    public function update(TradeItemUpdateRequest $request, TradeItem $tradeItem): Response
    {
        $tradeItem->update($request->validated());

        $request->session()->flash('tradeItem.id', $tradeItem->id);

        return redirect()->route('tradeItem.index');
    }

    public function destroy(Request $request, TradeItem $tradeItem): Response
    {
        $tradeItem->delete();

        return redirect()->route('tradeItem.index');
    }
}
