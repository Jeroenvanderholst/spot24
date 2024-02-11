<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ItemRelationStoreRequest;
use App\Http\Requests\EtimXchange\ItemRelationUpdateRequest;
use App\Models\EtimXchange\ItemRelation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemRelationController extends Controller
{
    public function index(Request $request): Response
    {
        $itemRelations = ItemRelation::all();

        return view('itemRelation.index', compact('itemRelations'));
    }

    public function create(Request $request): Response
    {
        return view('itemRelation.create');
    }

    public function store(ItemRelationStoreRequest $request): Response
    {
        $itemRelation = ItemRelation::create($request->validated());

        $request->session()->flash('itemRelation.id', $itemRelation->id);

        return redirect()->route('itemRelation.index');
    }

    public function show(Request $request, ItemRelation $itemRelation): Response
    {
        return view('itemRelation.show', compact('itemRelation'));
    }

    public function edit(Request $request, ItemRelation $itemRelation): Response
    {
        return view('itemRelation.edit', compact('itemRelation'));
    }

    public function update(ItemRelationUpdateRequest $request, ItemRelation $itemRelation): Response
    {
        $itemRelation->update($request->validated());

        $request->session()->flash('itemRelation.id', $itemRelation->id);

        return redirect()->route('itemRelation.index');
    }

    public function destroy(Request $request, ItemRelation $itemRelation): Response
    {
        $itemRelation->delete();

        return redirect()->route('itemRelation.index');
    }
}
