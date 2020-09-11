<?php

namespace App\Http\Controllers;

use App\{
    Devis, Categories, service, Formations
};
use Illuminate\Http\Request;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $services = service::all();
        $formations = Formations::all();
        $serviceDevis = null;

         return view('devis.create', compact('categories', 'services', 'formations', 'serviceDevis'))
                    ->with('success', '');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $categories = Categories::all();
        
        // return view('devis.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Devis::create([
            'nom' => $request->first_name,
            'email' => $request->email,
            'service_id' => $request->service_id,
            'message' => $request->message,
            'entreprisename' => $request->societe ?? null,
            'telephone' => $request->phone,
        ]);
   
        $categories = Categories::all();
        $services = service::all();
        $formations = Formations::all();

        $serviceDevis = service::find($request->service_id)->first();

         return view('devis.create', compact('categories', 'services', 'formations', 'serviceDevis'))
                    ->with('success', 'Devis envoyee avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categories = Categories::all();
        $services = service::all();
        $formations = Formations::all();
        $serviceDevis = service::find($id)->first();
 
         return view('devis.create', compact('categories', 'services', 'formations', 'serviceDevis'))
                    ->with('success', '');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function edit(Devis $devis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devis $devis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devis $devis)
    {
        //
    }
}
