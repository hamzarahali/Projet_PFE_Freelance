<?php

namespace App\Http\Controllers\Admin;

use App\{
    Formations, Comment, User, Command, Rendezvous };
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;

class FormationController extends Controller
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
        $formations = Formations::all();
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
        return view('admin.formations.index',compact('formations', 'comments', 'tabs', 'notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return view('admin.formations.create', compact('comments', 'notif', 'tabs'));
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
            'image' => 'required',
            'description' => 'required', 
        ]);

        $filename = 'formations/'.Str::uuid().'.png';
        $path = public_path($filename);
        $image = Image::make(file_get_contents($request->image))->save($path);

        Formations::create([
            'nom'           => $request->nom,
            'image'         => $filename,
            'description'   => $request->description
        ]);
   
        return redirect()->route('admin.formations.index')
                        ->with('success','Formation ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function show(Formations $formation)
    {
        return view('admin.formations.show',['formations'=>$formation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function edit(Formations $formation)
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
        return view('admin.formations.edit')->with([
            'formations' => $formation,
            'comments'  => $comments,
            'tabs'  => $tabs,
            'notif' => $notif
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formations $formation)
    {
        $request->validate([
            'nom' => 'required',
            'image' => 'required',
            'description' => 'required',
        
        ]);

        $filename = 'formations/'.Str::uuid().'.png';
        $path = public_path($filename);
        $image = Image::make(file_get_contents($request->image))->save($path);
     
        $formation->update([
            'nom'           => $request->nom,
            'image'         => $filename,
            'description'   => $request->description
        ]);
  
        return redirect()->route('admin.formations.index')
                        ->with('success','Formation modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formations  $formations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formations $formation)
    {
        $formation->delete();
  
        return redirect()->route('admin.formations.index')
                        ->with('success','Formation supprimée avec succès');
    }
}
