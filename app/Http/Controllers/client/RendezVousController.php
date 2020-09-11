<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\{
    service, Produits, Formations, Categories, Comment, Rendezvous
};

class RendezVousController extends Controller
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
    public function create(Request $request)
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
        $dates = Rendezvous::where('date', $request->date)
                            ->where('service_id', $request->service)
                            ->get();
        $heures = [];
        foreach ($dates as $date) {
            $heures []= $date->heure;
        }
        $test = 1;
    
        $heurestot = ['9', '10', '11', '12'];

        $testh = 1;
        $heures = array_diff($heurestot, $heures);
        $date = $request->date;
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        $service = service::find($request->service);

        return view('services.create', compact('services', 'categories', 'formations', 'service', 'test', 'heures', 'date', 'testh'))
                ->with('success','');
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
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();

        if (auth()->user() != null) {
            $service = service::find($id);
            $test = 0;
            $heures= null;
            $testh = 0;

            return view('services.create', compact('services', 'categories', 'formations', 'service', 'test', 'heures', 'testh'))
            
                    ->with('success', '');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit(Request $request)
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
        //.
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
