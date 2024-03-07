<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ItemDescriptionStoreRequest;
use App\Http\Requests\EtimXchange\ItemDescriptionUpdateRequest;
use App\Models\ItemDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemDescriptionController extends Controller
{
    public function index(Request $request): Response
    {
        $itemDescriptions = ItemDescription::all();

        return view('itemDescription.index', compact('itemDescriptions'));
    }

    public function create(Request $request): Response
    {
        return view('itemDescription.create');
    }

    public function store(ItemDescriptionStoreRequest $request): Response
    {
        $itemDescription = ItemDescription::create($request->validated());

        $request->session()->flash('itemDescription.id', $itemDescription->id);

        return redirect()->route('itemDescription.index');
    }

    public function show(Request $request, ItemDescription $itemDescription): Response
    {
        return view('itemDescription.show', compact('itemDescription'));
    }

    public function edit(Request $request, ItemDescription $itemDescription): Response
    {
        return view('itemDescription.edit', compact('itemDescription'));
    }

    public function update(ItemDescriptionUpdateRequest $request, ItemDescription $itemDescription): Response
    {
        $itemDescription->update($request->validated());

        $request->session()->flash('itemDescription.id', $itemDescription->id);

        return redirect()->route('itemDescription.index');
    }

    public function destroy(Request $request, ItemDescription $itemDescription): Response
    {
        $itemDescription->delete();

        return redirect()->route('itemDescription.index');
    }
}
