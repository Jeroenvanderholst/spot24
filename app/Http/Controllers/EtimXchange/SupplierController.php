<?php

namespace App\Http\Controllers\EtimXchange;

use App\EtimXchange\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\SupplierStoreRequest;
use App\Http\Requests\EtimXchange\SupplierUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(Request $request): Response
    {
        $suppliers = Supplier::all();

        return view('supplier.index', compact('suppliers'));
    }

    public function create(Request $request): Response
    {
        return view('supplier.create');
    }

    public function store(SupplierStoreRequest $request): Response
    {
        $supplier = Supplier::create($request->validated());

        $request->session()->flash('supplier.id', $supplier->id);

        return redirect()->route('supplier.index');
    }

    public function show(Request $request, Supplier $supplier): Response
    {
        return view('supplier.show', compact('supplier'));
    }

    public function edit(Request $request, Supplier $supplier): Response
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(SupplierUpdateRequest $request, Supplier $supplier): Response
    {
        $supplier->update($request->validated());

        $request->session()->flash('supplier.id', $supplier->id);

        return redirect()->route('supplier.index');
    }

    public function destroy(Request $request, Supplier $supplier): Response
    {
        $supplier->delete();

        return redirect()->route('supplier.index');
    }
}
