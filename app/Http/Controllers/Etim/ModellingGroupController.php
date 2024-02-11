<?php

namespace App\Http\Controllers\Etim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ModellingGroupStoreRequest;
use App\Http\Requests\Etim\ModellingGroupUpdateRequest;
use App\Models\Etim\ModellingGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModellingGroupController extends Controller
{
    public function index(Request $request): Response
    {
        $modellingGroups = ModellingGroup::all();

        return view('modellingGroup.index', compact('modellingGroups'));
    }

    public function create(Request $request): Response
    {
        return view('modellingGroup.create');
    }

    public function store(ModellingGroupStoreRequest $request): Response
    {
        $modellingGroup = ModellingGroup::create($request->validated());

        $request->session()->flash('modellingGroup.id', $modellingGroup->id);

        return redirect()->route('modellingGroup.index');
    }

    public function show(Request $request, ModellingGroup $modellingGroup): Response
    {
        return view('modellingGroup.show', compact('modellingGroup'));
    }

    public function edit(Request $request, ModellingGroup $modellingGroup): Response
    {
        return view('modellingGroup.edit', compact('modellingGroup'));
    }

    public function update(ModellingGroupUpdateRequest $request, ModellingGroup $modellingGroup): Response
    {
        $modellingGroup->update($request->validated());

        $request->session()->flash('modellingGroup.id', $modellingGroup->id);

        return redirect()->route('modellingGroup.index');
    }

    public function destroy(Request $request, ModellingGroup $modellingGroup): Response
    {
        $modellingGroup->delete();

        return redirect()->route('modellingGroup.index');
    }
}
