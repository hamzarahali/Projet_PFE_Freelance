<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{
    service, Produits, Formations, Categories, Comment, Rendezvous
};

class ServiceController extends Controller
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
        
        return view('services.index', compact('services', 'categories', 'formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        $service = service::find($id);

        $comments = Comment::where('service_id', $id)->get();
        $user = auth()->user();

        $test = false;

        $comment =   Comment::find(500);


        return view('services.show', compact('services', 'categories', 'formations', 'service', 'comments', 'comment','user', 'test'));
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
        $comment = Comment::find($id);
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        $service = service::find($comment->service_id);

        $comments = Comment::where('service_id', $comment->service_id)->get();
        $user = auth()->user();

        $test = true ;
        return view('services.show', compact('services', 'categories', 'formations', 'service', 'comments', 'comment','user', 'test'));
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
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();
        $service = service::find($id);

        $comments = Comment::where('service_id', $id)->get();
        $user = auth()->user();

        $test = true;

        $comment =   Comment::find(500);

        return view('services.show', compact('services', 'categories', 'formations', 'service', 'comments', 'comment','user', 'test'));
    }
}
