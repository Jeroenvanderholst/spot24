<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\PackagingDetailStoreRequest;
use App\Http\Requests\EtimXchange\PackagingDetailUpdateRequest;
use App\Models\EtimXchange\PackagingDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackagingDetailController extends Controller
{
    public function index(Request $request): Response
    {
        $packagingDetails = PackagingDetail::all();

        return view('packagingDetail.index', compact('packagingDetails'));
    }

    public function create(Request $request): Response
    {
        return view('packagingDetail.create');
    }

    public function store(PackagingDetailStoreRequest $request): Response
    {
        $packagingDetail = PackagingDetail::create($request->validated());

        $request->session()->flash('packagingDetail.id', $packagingDetail->id);

        return redirect()->route('packagingDetail.index');
    }

    public function show(Request $request, PackagingDetail $packagingDetail): Response
    {
        return view('packagingDetail.show', compact('packagingDetail'));
    }

    public function edit(Request $request, PackagingDetail $packagingDetail): Response
    {
        return view('packagingDetail.edit', compact('packagingDetail'));
    }

    public function update(PackagingDetailUpdateRequest $request, PackagingDetail $packagingDetail): Response
    {
        $packagingDetail->update($request->validated());

        $request->session()->flash('packagingDetail.id', $packagingDetail->id);

        return redirect()->route('packagingDetail.index');
    }

    public function destroy(Request $request, PackagingDetail $packagingDetail): Response
    {
        $packagingDetail->delete();

        return redirect()->route('packagingDetail.index');
    }
}
