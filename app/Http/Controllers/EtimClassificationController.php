<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtimClassificationStoreRequest;
use App\Http\Requests\EtimClassificationUpdateRequest;
use App\Models\EtimClassification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Inertia\Inertia;

class EtimClassificationController extends Controller
{
    public function index()
    {
        $etimClassifications = EtimClassification::all();

        // In a controller method, after performing an action
        //request()->session()->flash('success', 'Your message was sent successfully yeay!');
        // or for an error message
        //request()->session()->flash('error', 'There was a problem sending your message.');


        return Inertia::render('Etim/Classification/Index', [
            'etimStats' => $this->getEtimStats(), 
            'etim_connection' => Session::get('etim_connection'),
            'classifications' => $etimClassifications

        ]);


    }

    public function create(Request $request): Response
    {
        return view('etimClassification.create');
    }

    public function store(EtimClassificationStoreRequest $request): Response
    {
        $etimClassification = EtimClassification::create($request->validated());

        $request->session()->flash('etimClassification.id', $etimClassification->id);

        return redirect()->route('etimClassification.index');
    }

    public function show(Request $request, EtimClassification $etimClassification): Response
    {
        return view('etimClassification.show', compact('etimClassification'));
    }

    public function edit(Request $request, EtimClassification $etimClassification): Response
    {
        return view('etimClassification.edit', compact('etimClassification'));
    }

    public function update(EtimClassificationUpdateRequest $request, EtimClassification $etimClassification): Response
    {
        $etimClassification->update($request->validated());

        $request->session()->flash('etimClassification.id', $etimClassification->id);

        return redirect()->route('etimClassification.index');
    }

    public function destroy(Request $request, EtimClassification $etimClassification): Response
    {
        $etimClassification->delete();

        return redirect()->route('etimClassification.index');
    }

    public function getEtimStats() 
    {


        $etimStats = [
            // 'versionDescription' => $version->description,
            // 'versionDate' => $version->date,
            'unitCount' => \App\Models\Unit::count(),
            'valueCount' => \App\Models\Value::count(),
            'featureCount' => \App\Models\Feature::count(),
            'groupCount' => \App\Models\Group::count(),
            'productClassCount' => \App\Models\ProductClass::count(),
            'modellingClassCount' => \App\Models\ModellingClass::count(),
            'translationCount' => \App\Models\Translation::count(),
            'synonymCount' => \App\Models\Synonym::count(),
        ];

        return $etimStats; 

    }
}
