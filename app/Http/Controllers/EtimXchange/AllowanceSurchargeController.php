<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\AllowanceSurchargeStoreRequest;
use App\Http\Requests\EtimXchange\AllowanceSurchargeUpdateRequest;
use App\Models\EtimXchange\AllowanceSurcharge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AllowanceSurchargeController extends Controller
{
    public function index(Request $request): Response
    {
        $allowanceSurcharges = AllowanceSurcharge::all();

        return view('allowanceSurcharge.index', compact('allowanceSurcharges'));
    }

    public function create(Request $request): Response
    {
        return view('allowanceSurcharge.create');
    }

    public function store(AllowanceSurchargeStoreRequest $request): Response
    {
        $allowanceSurcharge = AllowanceSurcharge::create($request->validated());

        $request->session()->flash('allowanceSurcharge.id', $allowanceSurcharge->id);

        return redirect()->route('allowanceSurcharge.index');
    }

    public function show(Request $request, AllowanceSurcharge $allowanceSurcharge): Response
    {
        return view('allowanceSurcharge.show', compact('allowanceSurcharge'));
    }

    public function edit(Request $request, AllowanceSurcharge $allowanceSurcharge): Response
    {
        return view('allowanceSurcharge.edit', compact('allowanceSurcharge'));
    }

    public function update(AllowanceSurchargeUpdateRequest $request, AllowanceSurcharge $allowanceSurcharge): Response
    {
        $allowanceSurcharge->update($request->validated());

        $request->session()->flash('allowanceSurcharge.id', $allowanceSurcharge->id);

        return redirect()->route('allowanceSurcharge.index');
    }

    public function destroy(Request $request, AllowanceSurcharge $allowanceSurcharge): Response
    {
        $allowanceSurcharge->delete();

        return redirect()->route('allowanceSurcharge.index');
    }
}
