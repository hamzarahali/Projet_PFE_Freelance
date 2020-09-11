<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    service, Produits, Formations,Categories
};

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     *  @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $produits = Produits::where('nom','LIKE','%'.$request->nom.'%')->get();
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();

        return view('produits.search', compact('services', 'categories', 'formations', 'produits'))->with('success', '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
        $catProduits = Produits::where('categorie_id',$id)->get();
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        
        return view('produits.index', compact('services', 'categories', 'formations', 'catProduits'))->with('success', '');
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
        $produit = Produits::find($id)->first();
        $media1 = $produit->medias->first();
        $produits = Produits::all();
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();

        
        return view('produits.show', compact('services', 'categories', 'formations', 'produits', 'produit', 'media1'))->with('success', '');
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
