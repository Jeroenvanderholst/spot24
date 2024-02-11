<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\SupplierAttachmentStoreRequest;
use App\Http\Requests\EtimXchange\SupplierAttachmentUpdateRequest;
use App\Models\EtimXchange\SupplierAttachment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierAttachmentController extends Controller
{
    public function index(Request $request): Response
    {
        $supplierAttachments = SupplierAttachment::all();

        return view('supplierAttachment.index', compact('supplierAttachments'));
    }

    public function create(Request $request): Response
    {
        return view('supplierAttachment.create');
    }

    public function store(SupplierAttachmentStoreRequest $request): Response
    {
        $supplierAttachment = SupplierAttachment::create($request->validated());

        $request->session()->flash('supplierAttachment.id', $supplierAttachment->id);

        return redirect()->route('supplierAttachment.index');
    }

    public function show(Request $request, SupplierAttachment $supplierAttachment): Response
    {
        return view('supplierAttachment.show', compact('supplierAttachment'));
    }

    public function edit(Request $request, SupplierAttachment $supplierAttachment): Response
    {
        return view('supplierAttachment.edit', compact('supplierAttachment'));
    }

    public function update(SupplierAttachmentUpdateRequest $request, SupplierAttachment $supplierAttachment): Response
    {
        $supplierAttachment->update($request->validated());

        $request->session()->flash('supplierAttachment.id', $supplierAttachment->id);

        return redirect()->route('supplierAttachment.index');
    }

    public function destroy(Request $request, SupplierAttachment $supplierAttachment): Response
    {
        $supplierAttachment->delete();

        return redirect()->route('supplierAttachment.index');
    }
}
