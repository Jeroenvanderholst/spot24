<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\LcaEnvironmentalStoreRequest;
use App\Http\Requests\EtimXchange\LcaEnvironmentalUpdateRequest;
use App\Models\LcaEnvironmental;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LcaEnvironmentalController extends Controller
{
    public function index(Request $request): Response
    {
        $lcaEnvironmentals = LcaEnvironmental::all();

        return view('lcaEnvironmental.index', compact('lcaEnvironmentals'));
    }

    public function create(Request $request): Response
    {
        return view('lcaEnvironmental.create');
    }

    public function store(LcaEnvironmentalStoreRequest $request): Response
    {
        $lcaEnvironmental = LcaEnvironmental::create($request->validated());

        $request->session()->flash('lcaEnvironmental.id', $lcaEnvironmental->id);

        return redirect()->route('lcaEnvironmental.index');
    }

    public function show(Request $request, LcaEnvironmental $lcaEnvironmental): Response
    {
        return view('lcaEnvironmental.show', compact('lcaEnvironmental'));
    }

    public function edit(Request $request, LcaEnvironmental $lcaEnvironmental): Response
    {
        return view('lcaEnvironmental.edit', compact('lcaEnvironmental'));
    }

    public function update(LcaEnvironmentalUpdateRequest $request, LcaEnvironmental $lcaEnvironmental): Response
    {
        $lcaEnvironmental->update($request->validated());

        $request->session()->flash('lcaEnvironmental.id', $lcaEnvironmental->id);

        return redirect()->route('lcaEnvironmental.index');
    }

    public function destroy(Request $request, LcaEnvironmental $lcaEnvironmental): Response
    {
        $lcaEnvironmental->delete();

        return redirect()->route('lcaEnvironmental.index');
    }
}
