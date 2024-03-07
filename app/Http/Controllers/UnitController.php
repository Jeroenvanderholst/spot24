<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\UnitStoreRequest;
use App\Http\Requests\Etim\UnitUpdateRequest;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(Request $request): Response
    {
        $units = Unit::all();

        return view('unit.index', compact('units'));
    }

    public function create(Request $request): Response
    {
        return view('unit.create');
    }

    public function store(UnitStoreRequest $request): Response
    {
        $unit = Unit::create($request->validated());

        $request->session()->flash('unit.id', $unit->id);

        return redirect()->route('unit.index');
    }

    public function show(Request $request, Unit $unit): Response
    {
        return view('unit.show', compact('unit'));
    }

    public function edit(Request $request, Unit $unit): Response
    {
        return view('unit.edit', compact('unit'));
    }

    public function update(UnitUpdateRequest $request, Unit $unit): Response
    {
        $unit->update($request->validated());

        $request->session()->flash('unit.id', $unit->id);

        return redirect()->route('unit.index');
    }

    public function destroy(Request $request, Unit $unit): Response
    {
        $unit->delete();

        return redirect()->route('unit.index');
    }
}
