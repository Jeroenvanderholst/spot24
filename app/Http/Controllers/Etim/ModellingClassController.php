<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ModellingClassStoreRequest;
use App\Http\Requests\Etim\ModellingClassUpdateRequest;
use App\Models\Etim\ModellingClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModellingClassController extends Controller
{
    public function index(Request $request): Response
    {
        $modellingClasses = ModellingClass::all();

        return view('modellingClass.index', compact('modellingClasses'));
    }

    public function create(Request $request): Response
    {
        return view('modellingClass.create');
    }

    public function store(ModellingClassStoreRequest $request): Response
    {
        $modellingClass = ModellingClass::create($request->validated());

        $request->session()->flash('modellingClass.id', $modellingClass->id);

        return redirect()->route('modellingClass.index');
    }

    public function show(Request $request, ModellingClass $modellingClass): Response
    {
        return view('modellingClass.show', compact('modellingClass'));
    }

    public function edit(Request $request, ModellingClass $modellingClass): Response
    {
        return view('modellingClass.edit', compact('modellingClass'));
    }

    public function update(ModellingClassUpdateRequest $request, ModellingClass $modellingClass): Response
    {
        $modellingClass->update($request->validated());

        $request->session()->flash('modellingClass.id', $modellingClass->id);

        return redirect()->route('modellingClass.index');
    }

    public function destroy(Request $request, ModellingClass $modellingClass): Response
    {
        $modellingClass->delete();

        return redirect()->route('modellingClass.index');
    }
}
