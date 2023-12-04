<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\LivraisonsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RolesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('menu', [WelcomeController::class, 'index'])->name('menu');
Route::get('welcome', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('about', [WelcomeController::class, 'about'])->name('about');
Route::get('book', [WelcomeController::class, 'book'])->name('book');

Route::resource('clients', ClientsController::class);
Route::get('supprimer-client/{id}', [ClientsController::class, 'destroy']);

Route::resource('commandes', CommandesController::class);
Route::get('supprimer-commande/{id}', [CommandesController::class, 'destroy']);

Route::resource('livraisons',LivraisonsController::class);
Route::get('supprimer-livraison/{id}', [LivraisonsController::class, 'destroy']);

Route::resource('produits',ProduitsController::class);
Route::get('supprimer-produit/{id}', [ProduitsController::class, 'destroy']);

Route::resource('categories',CategoriesController::class);
Route::get('supprimer-categorie/{id}', [CategoriesController::class, 'destroy']);

Route::resource('authentification', AuthentificationController::class);

Route::resource('roles', RolesController::class);

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');


Route::post('/login',[AuthentificationController::class, 'login'] )->name('login');
Route::get('/logout',[AuthentificationController::class, 'logout'] )->name('logout');
