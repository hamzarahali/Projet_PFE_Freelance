<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    service, Produits, Formations, Cart,Categories, Command, CmdProduits
};

class CartController extends Controller
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
        if ( auth()->user() == null ){
            return redirect('login');
        } 
        $carts = Cart::get();
        $user = auth()->user();

        if ( $carts->count() == 0 ) {
            return redirect()->route('produit.show',$categories->first()->id ) ;
        } else {
            return view('cart.index', compact('services', 'categories', 'formations', 'carts', 'user'))->with('success', '');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $categories = Categories::all();

        $carts = Cart::all();
        $totalPrice = 0;
        foreach ($carts as $cart) {
            $totalPrice += $cart->produit->prix * $cart->quantite ; 
        }
        $command = Command::create([
            'user_id'       => auth()->user()->id,
            'prix_total'    => $totalPrice,
            'adresse'       => $request->adresse ?? ''
        ]); 

        foreach ($carts as $cart) {
            $cmdProduit = CmdProduits::create([
                'produit_id'    => $cart->produit_id,
                'quantite'      => $request->quantity[$cart->produit->id],
                'command_id'    => $command->id
            ]);
            $cart->delete();
            $cmdProduit->produit->quantite = $cmdProduit->produit->quantite - $request->quantity[$cart->produit->id]; 
            $cmdProduit->produit->update();
        }
        
        $catProduits = Produits::where('categorie_id', 1)->get();
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        
        return view('produits.index', compact('services', 'categories', 'formations', 'catProduits'))->with('success', 'Merci pour votre commande !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Request
     */
    public function show(Request $request ,$id)
    {
        //
        $user = auth()->user();
        if (is_null($user)) {
            return redirect()->route('login');
        } else {
            $cartSave = Cart::where('produit_id', $id)->first();
            if ( is_null($cartSave) ) {
                $produit = Produits::find($id);
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->produit_id = $produit->id;
                $cart->quantite = $request->quantity ?? 2;
                $cart->save();
            } else {

                $cartSave->quantite = $cartSave->quantite + $request->quantity ;
                $cartSave->update();
            }
            
            $produit = Produits::find($id)->first();
            $media1 = $produit->medias->first();
            $produits = Produits::all();
            $services = service::all();
            $categories = Categories::all();
            $formations = Formations::all();

        
            return view('produits.show', compact('services', 'categories', 'formations', 'produits', 'produit', 'media1'))->with('success', 'Produit ajoutée au panier');
        }
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
    public function destroy(Cart $cart)
    {
        //
        $cart->delete();

        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        $carts = Cart::get();
        $user = auth()->user();

        if ( $carts->count() == 0 ) {
            return redirect()->route('produit.show',$categories->first()->id ) ;
        } else {
            return view('cart.index', compact('services', 'categories', 'formations', 'carts', 'user'))->with('success', 'Produit supprimer');
        }
    }
}
