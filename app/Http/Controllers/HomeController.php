<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    service, Produits, Formations, Categories
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $services = service::all();
        $categories = Categories::all();
        $formations = Formations::all();

        return view('home', compact('services', 'categories', 'formations'));
    }
}
