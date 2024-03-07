<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\ItemAttachmentStoreRequest;
use App\Http\Requests\EtimXchange\ItemAttachmentUpdateRequest;
use App\Models\ItemAttachment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemAttachmentController extends Controller
{
    public function index(Request $request): Response
    {
        $itemAttachments = ItemAttachment::all();

        return view('itemAttachment.index', compact('itemAttachments'));
    }

    public function create(Request $request): Response
    {
        return view('itemAttachment.create');
    }

    public function store(ItemAttachmentStoreRequest $request): Response
    {
        $itemAttachment = ItemAttachment::create($request->validated());

        $request->session()->flash('itemAttachment.id', $itemAttachment->id);

        return redirect()->route('itemAttachment.index');
    }

    public function show(Request $request, ItemAttachment $itemAttachment): Response
    {
        return view('itemAttachment.show', compact('itemAttachment'));
    }

    public function edit(Request $request, ItemAttachment $itemAttachment): Response
    {
        return view('itemAttachment.edit', compact('itemAttachment'));
    }

    public function update(ItemAttachmentUpdateRequest $request, ItemAttachment $itemAttachment): Response
    {
        $itemAttachment->update($request->validated());

        $request->session()->flash('itemAttachment.id', $itemAttachment->id);

        return redirect()->route('itemAttachment.index');
    }

    public function destroy(Request $request, ItemAttachment $itemAttachment): Response
    {
        $itemAttachment->delete();

        return redirect()->route('itemAttachment.index');
    }
}
