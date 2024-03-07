<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimXchange\EtimModellingPortStoreRequest;
use App\Http\Requests\EtimXchange\EtimModellingPortUpdateRequest;
use App\ModelsModellingPort;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EtimModellingPortController extends Controller
{
    public function index(Request $request): Response
    {
        $etimModellingPorts = EtimModellingPort::all();

        return view('etimModellingPort.index', compact('etimModellingPorts'));
    }

    public function create(Request $request): Response
    {
        return view('etimModellingPort.create');
    }

    public function store(EtimModellingPortStoreRequest $request): Response
    {
        $etimModellingPort = EtimModellingPort::create($request->validated());

        $request->session()->flash('etimModellingPort.id', $etimModellingPort->id);

        return redirect()->route('etimModellingPort.index');
    }

    public function show(Request $request, EtimModellingPort $etimModellingPort): Response
    {
        return view('etimModellingPort.show', compact('etimModellingPort'));
    }

    public function edit(Request $request, EtimModellingPort $etimModellingPort): Response
    {
        return view('etimModellingPort.edit', compact('etimModellingPort'));
    }

    public function update(EtimModellingPortUpdateRequest $request, EtimModellingPort $etimModellingPort): Response
    {
        $etimModellingPort->update($request->validated());

        $request->session()->flash('etimModellingPort.id', $etimModellingPort->id);

        return redirect()->route('etimModellingPort.index');
    }

    public function destroy(Request $request, EtimModellingPort $etimModellingPort): Response
    {
        $etimModellingPort->delete();

        return redirect()->route('etimModellingPort.index');
    }
}
