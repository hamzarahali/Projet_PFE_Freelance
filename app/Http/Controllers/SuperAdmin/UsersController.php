<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Gate;
use Illuminate\Auth\Access\Gate as AccessGate;
use Illuminate\Contracts\Auth\Access\Gate as AuthAccessGate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Hash;
use App\Mail\Reponse;
use Illuminate\Support\Facades\Mail;
use App\{
    Comment, Command, Rendezvous
};

class UsersController extends Controller
{       public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::all();

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
        return view('superadmin.users.index', compact('comments', 'tabs', 'notif'))->with(['users'=> $users,
        'success'=> ""]);
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
        return view('superadmin.users.compte',compact('comments', 'tabs' , 'notif'))->with('success', '');

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

        $userSearch = User::where('email', $request->email)->get();
        if ($userSearch->count() == 0) {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'lastname'  => $request->lastname,
                'phone'     => $request->phone,
                'entreprisename' => $request->entreprise ?? null,
                'password'  => Hash::make($request->mdp)
            ]);
            $role = Role::select('id')->where('name', 'admin')->first();
            $role2 = Role::select('id')->where('name', 'client')->first();
            $user->roles()->attach($role);
            $user->roles()->attach($role2);

            $msg = "Email : ".$user->email." et votre Mot de passe : ".$request->mdp;
            Mail::to($user->email)->send(new Reponse($msg));
            $users = User::all();
            return view('superadmin.users.index',compact('comments' ,'tabs' , 'notif'))->with( ['users'=> $users,
            'success' => 'Compte administrateur créé avec succès']);
        } else {
            $users = User::all();
            return view('superadmin.users.compte',compact('comments', 'tabs', 'notif'))->with( ['users'=> $users,
            'success' => 'Email existe dejà .....']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   if(FacadesGate::denies('edit-users')){
        return redirect(route('superadmin.users.index'));
    }
        $roles = Role::all();
        $comments = Comment::where('comment_id', null)
                            ->where('user_id', '<>',auth()->user()->id)
                            ->get();

                            $currentUser = User::latest()->first();
                            $command = Command::latest()->first();
                            $rv = Rendezvous::latest()->first();
                    
                            $tabs = collect([
                                [ 'table' => 'Command'  , 'date' => $command->created_at ?? '0000-00-00 00:00:00'   , 'details' => 'Nouvelle commande' ],
                                [ 'table' => 'user'     , 'date' => $currentUser->created_at ?? '0000-00-00 00:00:00'      , 'details' => 'Nouveau utilisateur enregistré'],
                                [ 'table' => 'rv'       , 'date' => $rv->created_at ?? '0000-00-00 00:00:00'        , 'details' => 'Nouvelle demande de rendez-vous']
                            ]);
                    
                            $tabs = $tabs->sortByDesc('date');
                            $notif = 0;
                            foreach ($tabs as $tab) {
                                if ($tab['date'] !=  '0000-00-00 00:00:00' ) 
                                    $notif = $notif + 1;
                            }
        return view('superadmin.users.edit')->with([
            'user'  => $user,
            'roles' => $roles,
            'comments'  => $comments,
            'notif' => $notif, 
            'tabs'  => $tabs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        if ($user->save()) {
            $request->session()->flash('success', $user->name . ' has been updated');
        }else{
            $request->session()->flash('error', 'there was an error');
        }
        return redirect()->route('superadmin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    { if(FacadesGate::denies('delete-users')){
        return redirect(route('superadmin.users.index'));
    }
        $user->roles()->detach();
        $user->delete();
        $users = User::all();

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
        return view('superadmin.users.index', compact('comments', 'tabs' ,'notif'))->with(['users'=> $users,
            'success'=> "Compte supprimé avec succès"]);
    }
}
