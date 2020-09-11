<?php

namespace App\Http\Controllers;

use App\Rendezvous;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rendezvous = Rendezvous::all();
        
         return view('rendezvous.create', compact('rendezvous'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registre(Request $request)
    {
    
        $request->validate([
            'date' => 'required',
            'heure' => 'required',
            'service_id' => 'required',
            'user_id' => 'required',
            'adresse' => 'required',
           
            
        ]);
        Rendezvous::create($request->all());
   
        return redirect()->route('service.index')
                        ->with('success','rendez-vous created successfully.');
    }
    public function store(Request $request)
    {
       // dd("dsdsd");
    
        Rendezvous::create($request->all());
   
        return redirect()->route('service.index')
                        ->with('success','rendez-vous created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function show(Rendezvous $rendezvous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function edit(Rendezvous $rendezvous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rendezvous $rendezvous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rendezvous $rendezvous)
    {
        //
    }
}
