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
        request()->session()->flash('success', 'Your message was sent successfully yeay!');
        // or for an error message
        request()->session()->flash('error', 'There was a problem sending your message.');


        return Inertia::render('Etim/Classification/Index', [
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
            'unitCount' => DB::table('etim_units')->where('language', '=', 'EN')->count(),
            'valueCount' => DB::table('etim_values')->count(),
            'featureCount' => DB::table('etim_features')->count(),
            'groupCount' => DB::table('etim_groups')->count(),
            'productClassCount' => DB::table('etim_product_classes')->count(),
            'modellingClassCount' => DB::table('etim_modelling_classes')->count(),
            'translationCount' => DB::table('etim_translations')->count(),
            'synonymCount' => DB::table('etim_synonyms')->count(),
        ];

        return $etimStats; 

    }
}
