<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\produitController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /**
     * Logout Route
     */
    Route::get('/logout', [logoutController::class, 'perform'])->name('logout.perform');
    
    /**
     * Compte utilisateur
     */
    Route::get('/account', [ProfileController::class, 'account'])->name('account');
    Route::post('/account/update', [ProfileController::class, 'updateAccount'])->name('account.update');

});

/**
 * Route Produit
 */
Route::get('/produits', [produitController::class, 'allproduits'])->name('produits');
Route::get('/produits/detail/{id}', [produitController::class, 'produitDetail']);

/**
 * Route Card
 * 
 */

Route::post('/produits/ajouter', [CartController::class, 'store'])->name('cart.store');
Route::get('/videpanier', function () {
    Cart::destroy();
});

Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::get('/panier/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
require __DIR__.'/auth.php';
