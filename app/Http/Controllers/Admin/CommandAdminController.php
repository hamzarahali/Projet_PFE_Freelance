<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    Command, Comment, User, Rendezvous
};
use App\Mail\Reponse;
use Illuminate\Support\Facades\Mail;

class CommandAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $commands = Command::all();
        $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();
        $commandlatest = Command::latest()->first();
        
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

        return view('admin.commands.index', compact('commands', 'comments', 'tabs', 'notif'))->with('success',"");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $msg = "Votre commande a été bien enregistrée.

        Nous vous contacterons dans les plus brefs délais.
        
        Merci pour votre confiance.
        SITTE";
        Mail::to($request->email)->send(new Reponse($msg));

        $commands = Command::all(); 
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
        return view('admin.commands.index', compact('commands','comments', 'tabs', 'notif'))->with('success',"Email envoyé avec succès");

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
        dd ('bon0');
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
        $command = Command::find($id); 
        $command->delete();

        $commands = Command::all();
        $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();

        $commandlatest = Command::latest()->first();
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
        return view('admin.commands.index', compact('commands', 'comments', 'tabs', 'notif'))->with('success',"Commande supprimer....");
    }
}
