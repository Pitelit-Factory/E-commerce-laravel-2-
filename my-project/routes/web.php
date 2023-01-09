<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\produitController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
/**
 * Route client
 */
Route::get('/client', [clientController::class, 'client']);

/**
 * Route Produit
 */
Route::get('/produit', [produitController::class, 'produits']);
Route::get('/produit/delete/{id}', [produitController::class, 'produitDelete'])->name('produit.delete');
Route::get('/produit/update/{id}', [produitController::class, 'produitUpdate'])->name('produit.update');
Route::post('/produit/store', [produitController::class, 'storeUpdate'])->name('produit.store');
Route::get('produit/detail/{id}', [produitController::class, 'produitDetail']);

/**
 * Route accueil
 */

Route::get('/index', [produitController::class, 'indexProduits']);
/**
 * Route ajax
 */
Route::get('/get-ajax', function () {
    return view("get-ajax");
});

Route::get('/send-ajax', function () {
    return "ajax";
});

Route::get('/send-ajax', function () {
    return "ajax";
});


