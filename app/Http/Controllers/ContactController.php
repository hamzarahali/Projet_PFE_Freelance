<?php

namespace App\Http\Controllers;

use App\{
    Contact, DemandeFormation, Devis, Comment, User, Rendezvous, Command
};
use App\Mail\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function repondre(Request $request)
    { 
        $msg = '';
        if ($request->model == 'DemandeFormation'){
            $msg = DemandeFormation::find($request->id)->first()->message;
        }
        if ($request->model == 'Devis') {
            $msg = Devis::find($request->id)->first()->message;
        }
        if($request->model == 'Contact') {
            $msg = Contact::find($request->id)->first()->message;
        }
        $comments = Comment::all();
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
            'email' => $request->mail,
            'msg'   => $msg,
            'message'   => '',
            'comments'  => $comments,
            'tabs'      => $tabs,
            'notif'     => $notif
            ]);
    }
    public function reponse(Request $request)
    { 
        Mail::to($request->email)->send(new Reponse($request->msg));
 //dd("reussit");
 $comments = Comment::all();

     return view("admin.contacts.repondre", compact('msg', 'comments'))->with([
         'email'=>$request->mail,
        ]);
    }
      
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd("ds");
        return view('contact.create');
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
            'email' => 'required',
            'phone' => 'required',
            'sujet' => 'required',
            'message' => 'required',
           
            
        ]);
        Contact::create($request->all());
   
        return redirect()->route('contact.create')
                        ->with('success','message envoyée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
