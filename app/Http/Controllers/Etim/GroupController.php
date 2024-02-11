<?php

namespace App\Http\Controllers\Etim;

use App\Etim\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\GroupStoreRequest;
use App\Http\Requests\Etim\GroupUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function index(Request $request): Response
    {
        $groups = Group::all();

        return view('group.index', compact('groups'));
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
