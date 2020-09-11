<?php

namespace App\Http\Controllers\Admin;
use App\Categories;
use App\Produits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;
use App\Comment;
use App\{
    Medias, User, Command, Rendezvous
};


class ProduitController extends Controller
{   public function __construct()
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
        $produits = Produits::all();
    
        $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();
                            $user = User::latest()->first();
                            $command = Command::latest()->first();
                            $rv = Rendezvous::latest()->first();
                    
                            $tabs = collect([
                                [ 'table' => 'Command'  , 'date' => $command->created_at ?? '0000-00-00 00:00:00'   , 'details' => 'Nouvelle commande' ],
                                [ 'table' => 'user'     , 'date' => $user->created_at ?? '0000-00-00 00:00:00'      , 'details' => 'Nouveau utilisateur enregistré'],
                                [ 'table' => 'rv'       , 'date' => $rv->created_at ?? '0000-00-00 00:00:00'        , 'details' => 'Nouvelle demande de rendez-vous']
                            ]);
                    
                            $tabs = $tabs->sortByDesc('date');
                            $notif = 0;
                            foreach ($tabs as $tab) {
                                if ($tab['date'] !=  '0000-00-00 00:00:00' ) 
                                    $notif = $notif + 1;
                            }
        return view('admin.produits.index',compact('produits', 'comments', 'tabs', 'notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
   //     dd($categories);
        $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();
                            $user = User::latest()->first();
                            $command = Command::latest()->first();
                            $rv = Rendezvous::latest()->first();
                    
                            $tabs = collect([
                                [ 'table' => 'Command'  , 'date' => $command->created_at ?? '0000-00-00 00:00:00'   , 'details' => 'Nouvelle commande' ],
                                [ 'table' => 'user'     , 'date' => $user->created_at ?? '0000-00-00 00:00:00'      , 'details' => 'Nouveau utilisateur enregistré'],
                                [ 'table' => 'rv'       , 'date' => $rv->created_at ?? '0000-00-00 00:00:00'        , 'details' => 'Nouvelle demande de rendez-vous']
                            ]);
                    
                            $tabs = $tabs->sortByDesc('date');
                            $notif = 0;
                            foreach ($tabs as $tab) {
                                if ($tab['date'] !=  '0000-00-00 00:00:00' ) 
                                    $notif = $notif + 1;
                            }
    return view('admin.produits.create', compact('categories', 'comments', 'notif', 'tabs'));
        //return view('admin.produits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'image1' => 'required',
            'categorie_id' => 'required',
            'description' => 'required',
            'marque' => 'required',
            'quantite' => 'required',
            'prix' => 'required',
            
        ]);

        $produit = Produits::create([
            'nom'           => $request->nom,
            'categorie_id'  => $request->categorie_id,
            'description'   => $request->description,
            'marque'        => $request->marque,
            'quantite'      => $request->quantite,
            'prix'          => $request->prix
        ]);
        
        $filename = 'produits/'.Str::uuid().'.png';
        $path = public_path($filename);
        $image = Image::make(file_get_contents($request->image1))->save($path);

        $media = Medias::create([
            'produits_id'    => $produit->id,
            'path'          => $filename,
            'type'          => 'image1'
        ]);

        //-------------------

        if ( $request->has('image2')) {
            $filename = 'produits/'.Str::uuid().'.png';
            $path = public_path($filename);
            $image = Image::make(file_get_contents($request->image2))->save($path);

            $media = Medias::create([
                'produits_id'    => $produit->id,
                'path'          => $filename,
                'type'          => 'image2'
            ]);
        }
        // ----------------
        if ( $request->has('image3')) {
            $filename = 'produits/'.Str::uuid().'.png';
            $path = public_path($filename);
            $image = Image::make(file_get_contents($request->image3))->save($path);

            $media = Medias::create([
                'produits_id'    => $produit->id,
                'path'          => $filename,
                'type'          => 'image3'
            ]);
        }

        // ------------------
        if ( $request->has('image4')) {
            $filename = 'produits/'.Str::uuid().'.png';
            $path = public_path($filename);
            $image = Image::make(file_get_contents($request->image4))->save($path);

            $media = Medias::create([
                'produits_id'    => $produit->id,
                'path'          => $filename,
                'type'          => 'image4'
            ]);
        }

        

        return redirect()->route('admin.produits.index')
                        ->with('success','Produit ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function show(Produits $produit)
    {
        $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();
                            $user = User::latest()->first();
                            $command = Command::latest()->first();
                            $rv = Rendezvous::latest()->first();
                    
                            $tabs = collect([
                                [ 'table' => 'Command'  , 'date' => $command->created_at ?? '0000-00-00 00:00:00'   , 'details' => 'Nouvelle commande' ],
                                [ 'table' => 'user'     , 'date' => $user->created_at ?? '0000-00-00 00:00:00'      , 'details' => 'Nouveau utilisateur enregistré'],
                                [ 'table' => 'rv'       , 'date' => $rv->created_at ?? '0000-00-00 00:00:00'        , 'details' => 'Nouvelle demande de rendez-vous']
                            ]);
                    
                            $tabs = $tabs->sortByDesc('date');
                            $notif = 0;
                            foreach ($tabs as $tab) {
                                if ($tab['date'] !=  '0000-00-00 00:00:00' ) 
                                    $notif = $notif + 1;
                            }
        return view('admin.produits.show',['produits'=>$produit,
        'comments' => $comments, 'tabs' => $tabs , 'notif' => $notif]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function edit(Produits $produit)
    {
        //dd($produit);
        //dd('dfdf');
       // dd($produits);
       $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();
       $categories = Categories::all();
       $user = User::latest()->first();
       $command = Command::latest()->first();
       $rv = Rendezvous::latest()->first();

       $tabs = collect([
           [ 'table' => 'Command'  , 'date' => $command->created_at ?? '0000-00-00 00:00:00'   , 'details' => 'Nouvelle commande' ],
           [ 'table' => 'user'     , 'date' => $user->created_at ?? '0000-00-00 00:00:00'      , 'details' => 'Nouveau utilisateur enregistré'],
           [ 'table' => 'rv'       , 'date' => $rv->created_at ?? '0000-00-00 00:00:00'        , 'details' => 'Nouvelle demande de rendez-vous']
       ]);

       $tabs = $tabs->sortByDesc('date');
       $notif = 0;
       foreach ($tabs as $tab) {
           if ($tab['date'] !=  '0000-00-00 00:00:00' ) 
               $notif = $notif + 1;
       }
        return view('admin.produits.edit')->with([
            'produits'  => $produit,
            'comments'  => $comments,
            'categories'=> $categories,
            'tabs'  => $tabs, 
            'notif' => $notif
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produits $produit)
    {
        $request->validate([
            'nom' => 'required',
            'image1' => 'required',
            'description' => 'required',
            'marque' => 'required',
            'quantite' => 'required',
            'prix' => 'required',
        ]);

        $produit->update([
            'nom'           => $request->nom,
            'description'   => $request->description,
            'marque'        => $request->marque,
            'quantite'      => $request->quantite,
            'prix'          => $request->prix,
            'categorie_id'  => $request->categorie_id
        ]);
  
        $medias = Medias::where('produits_id', $produit->id)->get();    
        foreach ($medias as $media) {
            $media->delete();
        }

        $filename = 'produits/'.Str::uuid().'.png';
        $path = public_path($filename);
        $image = Image::make(file_get_contents($request->image1))->save($path);

        $media = Medias::create([
            'produits_id'    => $produit->id,
            'path'          => $filename,
            'type'          => 'image1'
        ]);

        //-------------------

        if ( $request->has('image2')) {
            $filename = 'produits/'.Str::uuid().'.png';
            $path = public_path($filename);
            $image = Image::make(file_get_contents($request->image2))->save($path);

            $media = Medias::create([
                'produits_id'    => $produit->id,
                'path'          => $filename,
                'type'          => 'image2'
            ]);
        }
        // ----------------
        if ( $request->has('image3')) {
            $filename = 'produits/'.Str::uuid().'.png';
            $path = public_path($filename);
            $image = Image::make(file_get_contents($request->image3))->save($path);

            $media = Medias::create([
                'produits_id'    => $produit->id,
                'path'          => $filename,
                'type'          => 'image3'
            ]);
        }

        // ------------------
        if ( $request->has('image4')) {
            $filename = 'produits/'.Str::uuid().'.png';
            $path = public_path($filename);
            $image = Image::make(file_get_contents($request->image4))->save($path);

            $media = Medias::create([
                'produits_id'    => $produit->id,
                'path'          => $filename,
                'type'          => 'image4'
            ]);
        }

        
        return redirect()->route('admin.produits.index')
                        ->with('success','Produit modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produits  $produits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produits $produit)
    {
        $produit->delete();
  
        return redirect()->route('admin.produits.index')
                        ->with('success','Produit supprimé avec succès');
    }
}
