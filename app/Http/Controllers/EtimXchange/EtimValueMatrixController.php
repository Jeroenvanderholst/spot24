<?php

namespace App\Http\Controllers\EtimXchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\EtimValueMatrixStoreRequest;
use App\Http\Requests\EtimXchange\EtimValueMatrixUpdateRequest;
use App\Models\EtimXchange\EtimValueMatrix;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtimValueMatrixController extends Controller
{
    public function index(Request $request): Response
    {
        $etimValueMatrices = EtimValueMatrix::all();

        return view('etimValueMatrix.index', compact('etimValueMatrices'));
    }

    public function create(Request $request): Response
    {
        return view('etimValueMatrix.create');
    }

    public function store(EtimValueMatrixStoreRequest $request): Response
    {
        $etimValueMatrix = EtimValueMatrix::create($request->validated());

        $request->session()->flash('etimValueMatrix.id', $etimValueMatrix->id);

        return redirect()->route('etimValueMatrix.index');
    }

    public function show(Request $request, EtimValueMatrix $etimValueMatrix): Response
    {
        return view('etimValueMatrix.show', compact('etimValueMatrix'));
    }

    public function edit(Request $request, EtimValueMatrix $etimValueMatrix): Response
    {
        return view('etimValueMatrix.edit', compact('etimValueMatrix'));
    }

    public function update(EtimValueMatrixUpdateRequest $request, EtimValueMatrix $etimValueMatrix): Response
    {
        $etimValueMatrix->update($request->validated());

        $request->session()->flash('etimValueMatrix.id', $etimValueMatrix->id);

        return redirect()->route('etimValueMatrix.index');
    }

    public function destroy(Request $request, EtimValueMatrix $etimValueMatrix): Response
    {
        $etimValueMatrix->delete();

        return redirect()->route('etimValueMatrix.index');
    }
}
