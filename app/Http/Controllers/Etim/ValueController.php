<?php

namespace App\Http\Controllers\Etim;

use App\Etim\Value;
use App\Http\Controllers\Controller;
use App\Http\Requests\Etim\ValueStoreRequest;
use App\Http\Requests\Etim\ValueUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ValueController extends Controller
{
    public function index(Request $request): Response
    {
        $values = Value::all();

        return view('value.index', compact('values'));
    }

    public function create(Request $request): Response
    {
        return view('value.create');
    }

    public function store(ValueStoreRequest $request): Response
    {
        $value = Value::create($request->validated());

        $request->session()->flash('value.id', $value->id);

        return redirect()->route('value.index');
    }

    public function show(Request $request, Value $value): Response
    {
        return view('value.show', compact('value'));
    }

    public function edit(Request $request, Value $value): Response
    {
        return view('value.edit', compact('value'));
    }

    public function update(ValueUpdateRequest $request, Value $value): Response
    {
        $value->update($request->validated());

        $request->session()->flash('value.id', $value->id);

        return redirect()->route('value.index');
    }

    public function destroy(Request $request, Value $value): Response
    {
        $value->delete();

        return redirect()->route('value.index');
    }
}
