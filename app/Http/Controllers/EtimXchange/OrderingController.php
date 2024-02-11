<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\OrderingStoreRequest;
use App\Http\Requests\EtimXchange\OrderingUpdateRequest;
use App\Models\EtimXchange\Ordering;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderingController extends Controller
{
    public function index(Request $request): Response
    {
        $orderings = Ordering::all();

        return view('ordering.index', compact('orderings'));
    }

    public function create(Request $request): Response
    {
        return view('ordering.create');
    }

    public function store(OrderingStoreRequest $request): Response
    {
        $ordering = Ordering::create($request->validated());

        $request->session()->flash('ordering.id', $ordering->id);

        return redirect()->route('ordering.index');
    }

    public function show(Request $request, Ordering $ordering): Response
    {
        return view('ordering.show', compact('ordering'));
    }

    public function edit(Request $request, Ordering $ordering): Response
    {
        return view('ordering.edit', compact('ordering'));
    }

    public function update(OrderingUpdateRequest $request, Ordering $ordering): Response
    {
        $ordering->update($request->validated());

        $request->session()->flash('ordering.id', $ordering->id);

        return redirect()->route('ordering.index');
    }

    public function destroy(Request $request, Ordering $ordering): Response
    {
        $ordering->delete();

        return redirect()->route('ordering.index');
    }
}
