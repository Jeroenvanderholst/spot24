<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ItemLogisticDetailStoreRequest;
use App\Http\Requests\EtimXchange\ItemLogisticDetailUpdateRequest;
use App\Models\ItemLogisticDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemLogisticDetailController extends Controller
{
    public function index(Request $request): Response
    {
        $itemLogisticDetails = ItemLogisticDetail::all();

        return view('itemLogisticDetail.index', compact('itemLogisticDetails'));
    }

    public function create(Request $request): Response
    {
        return view('itemLogisticDetail.create');
    }

    public function store(ItemLogisticDetailStoreRequest $request): Response
    {
        $itemLogisticDetail = ItemLogisticDetail::create($request->validated());

        $request->session()->flash('itemLogisticDetail.id', $itemLogisticDetail->id);

        return redirect()->route('itemLogisticDetail.index');
    }

    public function show(Request $request, ItemLogisticDetail $itemLogisticDetail): Response
    {
        return view('itemLogisticDetail.show', compact('itemLogisticDetail'));
    }

    public function edit(Request $request, ItemLogisticDetail $itemLogisticDetail): Response
    {
        return view('itemLogisticDetail.edit', compact('itemLogisticDetail'));
    }

    public function update(ItemLogisticDetailUpdateRequest $request, ItemLogisticDetail $itemLogisticDetail): Response
    {
        $itemLogisticDetail->update($request->validated());

        $request->session()->flash('itemLogisticDetail.id', $itemLogisticDetail->id);

        return redirect()->route('itemLogisticDetail.index');
    }

    public function destroy(Request $request, ItemLogisticDetail $itemLogisticDetail): Response
    {
        $itemLogisticDetail->delete();

        return redirect()->route('itemLogisticDetail.index');
    }
}
