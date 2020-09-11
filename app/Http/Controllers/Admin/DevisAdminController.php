<?php

namespace App\Http\Controllers\Admin;

use App\{ Devis, Comment, Rendezvous, Command, User };

use App\Mail\email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class DevisAdminController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $devis = Devis::all();
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
  
        return view('admin.devis.index',compact('devis', 'comments', 'tabs', 'notif'));
           // ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function repondre()
    {
        return view('admin.devis.repondre');
    }
    public function send(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $data = array(
            'message' => $request->message
        );
        Mail::to('$request->email')->send(new email($data));
        return back()->with('success', 'thanks');
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\Devis  $devis
     * @return \Illuminate\Http\Response
     */
    public function show(Devis $devis)
    {   
        return view('admin.devis.show',['devis'=>$devis]);
    }
 
    
}
