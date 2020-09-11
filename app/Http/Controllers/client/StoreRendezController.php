<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    service, Produits, Formations, Categories, Comment, Rendezvous
};

class StoreRendezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $user = auth()->user();
        $service = service::find($request->service);

        $rendezVous = RendezVous::create([
            'date'      => $request->date,
            'heure'     => $request->heure,
            'adresse'   => $request->adresse,
            'user_id'   => $user->id,
            'service_id'=> $service->id
        ]);

        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        $test = 0;
        $heures= null;
        $testh = 0;

        return view('services.create', compact('services', 'categories', 'formations', 'service', 'test', 'heures', 'testh'))
        
                ->with('success', 'Rendez vous avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
