<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ProductAttachmentStoreRequest;
use App\Http\Requests\EtimXchange\ProductAttachmentUpdateRequest;
use App\Models\ProductAttachment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductAttachmentController extends Controller
{
    public function index(Request $request): Response
    {
        $productAttachments = ProductAttachment::all();

        return view('productAttachment.index', compact('productAttachments'));
    }

    public function create(Request $request): Response
    {
        return view('productAttachment.create');
    }

    public function store(ProductAttachmentStoreRequest $request): Response
    {
        $productAttachment = ProductAttachment::create($request->validated());

        $request->session()->flash('productAttachment.id', $productAttachment->id);

        return redirect()->route('productAttachment.index');
    }

    public function show(Request $request, ProductAttachment $productAttachment): Response
    {
        return view('productAttachment.show', compact('productAttachment'));
    }

    public function edit(Request $request, ProductAttachment $productAttachment): Response
    {
        return view('productAttachment.edit', compact('productAttachment'));
    }

    public function update(ProductAttachmentUpdateRequest $request, ProductAttachment $productAttachment): Response
    {
        $productAttachment->update($request->validated());

        $request->session()->flash('productAttachment.id', $productAttachment->id);

        return redirect()->route('productAttachment.index');
    }

    public function destroy(Request $request, ProductAttachment $productAttachment): Response
    {
        $productAttachment->delete();

        return redirect()->route('productAttachment.index');
    }
}
