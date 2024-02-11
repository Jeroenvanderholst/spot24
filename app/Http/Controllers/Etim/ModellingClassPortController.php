<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ModellingClassPortStoreRequest;
use App\Http\Requests\Etim\ModellingClassPortUpdateRequest;
use App\Models\Etim\ModellingClassPort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModellingClassPortController extends Controller
{
    public function index(Request $request): Response
    {
        $modellingClassPorts = ModellingClassPort::all();

        return view('modellingClassPort.index', compact('modellingClassPorts'));
    }

    public function create(Request $request): Response
    {
        return view('modellingClassPort.create');
    }

    public function store(ModellingClassPortStoreRequest $request): Response
    {
        $modellingClassPort = ModellingClassPort::create($request->validated());

        $request->session()->flash('modellingClassPort.id', $modellingClassPort->id);

        return redirect()->route('modellingClassPort.index');
    }

    public function show(Request $request, ModellingClassPort $modellingClassPort): Response
    {
        return view('modellingClassPort.show', compact('modellingClassPort'));
    }

    public function edit(Request $request, ModellingClassPort $modellingClassPort): Response
    {
        return view('modellingClassPort.edit', compact('modellingClassPort'));
    }

    public function update(ModellingClassPortUpdateRequest $request, ModellingClassPort $modellingClassPort): Response
    {
        $modellingClassPort->update($request->validated());

        $request->session()->flash('modellingClassPort.id', $modellingClassPort->id);

        return redirect()->route('modellingClassPort.index');
    }

    public function destroy(Request $request, ModellingClassPort $modellingClassPort): Response
    {
        $modellingClassPort->delete();

        return redirect()->route('modellingClassPort.index');
    }
}
