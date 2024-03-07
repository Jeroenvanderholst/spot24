<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ItemCountrySpecificFieldStoreRequest;
use App\Http\Requests\EtimXchange\ItemCountrySpecificFieldUpdateRequest;
use App\Models\ItemCountrySpecificField;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemCountrySpecificFieldController extends Controller
{
    public function index(Request $request): Response
    {
        $itemCountrySpecificFields = ItemCountrySpecificField::all();

        return view('itemCountrySpecificField.index', compact('itemCountrySpecificFields'));
    }

    public function create(Request $request): Response
    {
        return view('itemCountrySpecificField.create');
    }

    public function store(ItemCountrySpecificFieldStoreRequest $request): Response
    {
        $itemCountrySpecificField = ItemCountrySpecificField::create($request->validated());

        $request->session()->flash('itemCountrySpecificField.id', $itemCountrySpecificField->id);

        return redirect()->route('itemCountrySpecificField.index');
    }

    public function show(Request $request, ItemCountrySpecificField $itemCountrySpecificField): Response
    {
        return view('itemCountrySpecificField.show', compact('itemCountrySpecificField'));
    }

    public function edit(Request $request, ItemCountrySpecificField $itemCountrySpecificField): Response
    {
        return view('itemCountrySpecificField.edit', compact('itemCountrySpecificField'));
    }

    public function update(ItemCountrySpecificFieldUpdateRequest $request, ItemCountrySpecificField $itemCountrySpecificField): Response
    {
        $itemCountrySpecificField->update($request->validated());

        $request->session()->flash('itemCountrySpecificField.id', $itemCountrySpecificField->id);

        return redirect()->route('itemCountrySpecificField.index');
    }

    public function destroy(Request $request, ItemCountrySpecificField $itemCountrySpecificField): Response
    {
        $itemCountrySpecificField->delete();

        return redirect()->route('itemCountrySpecificField.index');
    }
}
