<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\GroupStoreRequest;
use App\Http\Requests\Etim\GroupUpdateRequest;
use App\Models\Group;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all();

        return Inertia::render('group.index', compact('group'));
    }

    public function create(Request $request): Response
    {
        return view('group.create');
    }

    public function store(GroupStoreRequest $request): Response
    {
        $group = Group::create($request->validated());

        $request->session()->flash('group.id', $group->id);

        return redirect()->route('group.index');
    }

    public function show(Request $request, Group $group): Response
    {
        return view('group.show', compact('group'));
    }

    public function edit(Request $request, Group $group): Response
    {
        return view('group.edit', compact('group'));
    }

    public function update(GroupUpdateRequest $request, Group $group): Response
    {
        $group->update($request->validated());

        $request->session()->flash('group.id', $group->id);

        return redirect()->route('group.index');
    }

    public function destroy(Request $request, Group $group): Response
    {
        $group->delete();

        return redirect()->route('group.index');
    }
}
