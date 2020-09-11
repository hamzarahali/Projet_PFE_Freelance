<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Mail\Reponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\{
    Comment, User, Command, Rendezvous 
};

class ContactAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
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
        return view('admin.contacts.index',compact('contacts', 'comments', 'tabs', 'notif'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function repondre(Request $request)
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
        return view("admin.contacts.repondre")->with([
            'email'    =>$request->mail,
            'comments' => $comments,
            'message'   => '',
            'msg'       => '',
            'tabs'  => $tabs,
            'notif' => $notif
            ]);
    }
    public function reponse(Request $request)
    { 
        Mail::to($request->mail)->send(new Reponse($request->msg));
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
        return view("admin.contacts.repondre")->with([
            'email'  => $request->mail,
            'msg'   => '', 
            'message'  => 'Email envoyé avec succès',
            'comments'  => $comments,
            'tabs'  =>$tabs, 
            'notif' =>$notif
        ])
     ;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show',['contacts'=>$contact]);
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
