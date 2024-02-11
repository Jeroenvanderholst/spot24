<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\PackagingIdentificationStoreRequest;
use App\Http\Requests\EtimXchange\PackagingIdentificationUpdateRequest;
use App\Models\EtimXchange\PackagingIdentification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackagingIdentificationController extends Controller
{
    public function index(Request $request): Response
    {
        $packagingIdentifications = PackagingIdentification::all();

        return view('packagingIdentification.index', compact('packagingIdentifications'));
    }

    public function create(Request $request): Response
    {
        return view('packagingIdentification.create');
    }

    public function store(PackagingIdentificationStoreRequest $request): Response
    {
        $packagingIdentification = PackagingIdentification::create($request->validated());

        $request->session()->flash('packagingIdentification.id', $packagingIdentification->id);

        return redirect()->route('packagingIdentification.index');
    }

    public function show(Request $request, PackagingIdentification $packagingIdentification): Response
    {
        return view('packagingIdentification.show', compact('packagingIdentification'));
    }

    public function edit(Request $request, PackagingIdentification $packagingIdentification): Response
    {
        return view('packagingIdentification.edit', compact('packagingIdentification'));
    }

    public function update(PackagingIdentificationUpdateRequest $request, PackagingIdentification $packagingIdentification): Response
    {
        $packagingIdentification->update($request->validated());

        $request->session()->flash('packagingIdentification.id', $packagingIdentification->id);

        return redirect()->route('packagingIdentification.index');
    }

    public function destroy(Request $request, PackagingIdentification $packagingIdentification): Response
    {
        $packagingIdentification->delete();

        return redirect()->route('packagingIdentification.index');
    }
}
