<?php

namespace App\Http\Controllers\Admin;
use App\DemandeFormation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{
    Comment, User, Rendezvous, Command};

class DemandeFormationAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $demandeformations = DemandeFormation::all();
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
        return view('admin.demandeformation.index', compact('demandeformations', 'comments', 'tabs', 'notif'));
    }
         /**
     * Display the specified resource.
     *
     * @param  \App\DemandeFormation  $demandeformation
     * @return \Illuminate\Http\Response
     */
    public function show(DemandeFormation $demandeformation)
    {
        return view('admin.demandeformation.show',['demandeformation'=>$demandeformation]);
    }
}
