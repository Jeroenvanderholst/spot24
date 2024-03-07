<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\LcaDeclarationStoreRequest;
use App\Http\Requests\EtimXchange\LcaDeclarationUpdateRequest;
use App\Models\LcaDeclaration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LcaDeclarationController extends Controller
{
    public function index(Request $request): Response
    {
        $lcaDeclarations = LcaDeclaration::all();

        return view('lcaDeclaration.index', compact('lcaDeclarations'));
    }

    public function create(Request $request): Response
    {
        return view('lcaDeclaration.create');
    }

    public function store(LcaDeclarationStoreRequest $request): Response
    {
        $lcaDeclaration = LcaDeclaration::create($request->validated());

        $request->session()->flash('lcaDeclaration.id', $lcaDeclaration->id);

        return redirect()->route('lcaDeclaration.index');
    }

    public function show(Request $request, LcaDeclaration $lcaDeclaration): Response
    {
        return view('lcaDeclaration.show', compact('lcaDeclaration'));
    }

    public function edit(Request $request, LcaDeclaration $lcaDeclaration): Response
    {
        return view('lcaDeclaration.edit', compact('lcaDeclaration'));
    }

    public function update(LcaDeclarationUpdateRequest $request, LcaDeclaration $lcaDeclaration): Response
    {
        $lcaDeclaration->update($request->validated());

        $request->session()->flash('lcaDeclaration.id', $lcaDeclaration->id);

        return redirect()->route('lcaDeclaration.index');
    }

    public function destroy(Request $request, LcaDeclaration $lcaDeclaration): Response
    {
        $lcaDeclaration->delete();

        return redirect()->route('lcaDeclaration.index');
    }
}
