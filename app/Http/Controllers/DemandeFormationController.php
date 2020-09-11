<?php

namespace App\Http\Controllers;

use App\Formations;
use App\DemandeFormation;
use App\service;
use App\Categories;
use Illuminate\Http\Request;

class DemandeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              //
              $services = service::all();
              $categories = Categories::all();
              $formations = Formations::all();
        
        return view('demandeformation.create', compact('formations', 'services', 'categories'))->with('success', '');
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DemandeFormation::create([
            'nom'           => $request->nom, 
            'email'         => $request->email, 
            'telephone'     => $request->phone,
            'message'       => $request->message, 
            'formation_id'  => $request->formation_id
        ]);
   
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
  
  return view('demandeformation.create', compact('formations', 'services', 'categories'))
                        ->with('success','Demande envoyée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DemandeFormation  $demandeFormation
     * @return \Illuminate\Http\Response
     */
    public function show(DemandeFormation $demandeFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DemandeFormation  $demandeFormation
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandeFormation $demandeFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DemandeFormation  $demandeFormation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandeFormation $demandeFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DemandeFormation  $demandeFormation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandeFormation $demandeFormation)
    {
        //
    }
}
