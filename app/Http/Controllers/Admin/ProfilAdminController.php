<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\{
    Comment, User, Command, Rendezvous
};

class ProfilAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();
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

        return view ('admin.profile.index', compact('user', 'comments', 'tabs', 'notif'))->with('success','');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view ('admin.profile.password', compact('comments', 'tabs', 'notif'))->with('success','');
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
        
        $mdp_act = Hash::make($request->mdp_act);


        if ( $mdp_act == $user->password ) {
            $user->update ([
                'password'  => $request->mdp
            ]); 
            $user->save();
            $success = "Mot de passe modifier avec success";
        } else {
            $success = "Mot actuelle incorrecte";
        }

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
        return view ('admin.profile.password', compact('success', 'comments', 'tabs' ,'notif'));
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
    public function edit($id, Request $request)
    {
        //
        $user = User::find($id)->first();

        $user->update([
            'name'      => $request->name,
            'lastname'  => $request->lastname,
            'phone'     => $request->phone,
            'password'  => Hash::make($request->mdp) ?? $user->password ,
        ]);
        $user->save();
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
        return view ('admin.profile.index', compact('user', 'comments', 'tabs', 'notif'))->with('success','Modification avec success');
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
        dd ('nbo');
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
