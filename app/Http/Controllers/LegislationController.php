<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\LegislationStoreRequest;
use App\Http\Requests\EtimXchange\LegislationUpdateRequest;
use App\Models\Legislation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LegislationController extends Controller
{
    public function index(Request $request): Response
    {
        $legislations = Legislation::all();

        return view('legislation.index', compact('legislations'));
    }

    public function create(Request $request): Response
    {
        return view('legislation.create');
    }

    public function store(LegislationStoreRequest $request): Response
    {
        $legislation = Legislation::create($request->validated());

        $request->session()->flash('legislation.id', $legislation->id);

        return redirect()->route('legislation.index');
    }

    public function show(Request $request, Legislation $legislation): Response
    {
        return view('legislation.show', compact('legislation'));
    }

    public function edit(Request $request, Legislation $legislation): Response
    {
        return view('legislation.edit', compact('legislation'));
    }

    public function update(LegislationUpdateRequest $request, Legislation $legislation): Response
    {
        $legislation->update($request->validated());

        $request->session()->flash('legislation.id', $legislation->id);

        return redirect()->route('legislation.index');
    }

    public function destroy(Request $request, Legislation $legislation): Response
    {
        $legislation->delete();

        return redirect()->route('legislation.index');
    }
}
