<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\{
    service, Produits, Formations,Categories
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $services = service::all();
    $categories = Categories::all();
    $formations = Formations::all();

    return view('welcome', compact('services', 'categories', 'formations'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/login', function () {
            $services = service::all();
            $categories = Categories::all();
            $formations = Formations::all();

            return view('auth.login', compact('services', 'categories', 'formations'));
        })->name('login');
        Route::get('/register', function () {
            $services = service::all();
            $categories = Categories::all();
            $formations = Formations::all();

            return view('auth.register', compact('services', 'categories', 'formations'));
        })->name('register');

Route::resource('/contact', 'ContactController', ['except' =>['show', 'index', 'destroy', 'edit', 'update']]);
Route::get('/repondre','ContactController@repondre')->name('repondre')->middleware('can:admin');
Route::post('/reponse','ContactController@reponse')->name('reponse')->middleware('can:admin');
Route::get('/service','ServiceController@index')->name('service');
Route::resource('/demandeformation', 'DemandeFormationController');
Route::resource('/devis','DevisController');

Route::get('/apropos', function() {
    $services = service::all();
    $categories = Categories::all();
    $formations = Formations::all();

    return view('apropos.index', compact('services', 'categories', 'formations'));
})->name('apropos');


Route::resource('/produit', 'client\ProduitController');
Route::resource('/service', 'client\ServiceController');
Route::resource('/formation', 'client\FormationController');
Route::resource('/contactpage', 'client\ContactController');
Route::resource('/cart', 'client\CartController');
Route::resource('/comment','client\CommentController');
Route::resource('/rendezvous','client\RendezVousController');
Route::resource('/storerendezvous','client\StoreRendezController');


Route::get('/produitDelete/{cart}', 'client\CartController@destroy')->name('produitDelete');


/**
 * 15 / 08 / 2020 
 */
Route::namespace('SuperAdmin')->prefix('superadmin')->name('superadmin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function(){
    Route::resource('/contacts', 'ContactAdminController');
    Route::resource('/commands', 'CommandAdminController');
    Route::resource('/rendezvous', 'RendervousAdminController');
    Route::resource('/dashboard', 'DashboardController');
    Route::resource('/produits', 'ProduitController');
    Route::resource('/categories', 'CategorieController',['parameters' => [
        'categories' => 'categorie' ]]);
    Route::resource('/formations', 'FormationController');
    Route::resource('/services', 'ServiceController');
    Route::resource('/email', 'EmailAdminController');
    Route::resource('/profile', 'ProfilAdminController');

    Route::resource('/gestion_produits', 'ProduitController', ['except' =>['show', 'create', 'store']]);


    Route::get('/repondre/{mail}','ContactAdminController@repondre')->name('repondre')->middleware('can:admin');
    Route::post('/reponse','ContactAdminController@reponse')->name('reponse')->middleware('can:admin');
    
    Route::get('/demandeformation','DemandeFormationAdminController@index')->middleware('can:admin')->name('demandeformation.index');
    Route::get('/demandeformation/show/{demandeformation}','DemandeFormationAdminController@show')->middleware('can:admin')->name('demandeformation.show');
    //Route::get('contacts/repondre','ContactAdminController@repondre')->name('contacts.repondre');
    //Route::post('contacts/reponse','ContactAdminController@reponse')->name('contacts.reponse');
    Route::get('/devis', 'DevisAdminController@index')->name('devis.index');
    Route::get('/devis/show/{devis}', 'DevisAdminController@show')->name('devis.show');
    Route::get('/devis/repondre', 'DevisAdminController@repondre')->name('devis.repondre');
    Route::post('/devis/send', 'DevisAdminController@send')->name('devis.send');
    
    Route::get('/sendemail', 'ContactAdminController@repondre');
    Route::post('/sendemail/send', 'ContactAdminController@send');
   
});