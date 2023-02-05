<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\commandeController;
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
    Route::get('/account/update', [ProfileController::class, 'updateAccount'])->name('account.update');
    Route::post('/account/update/validate', [ProfileController::class, 'updateAccountValidate'])->name('account.updateValidate');

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
Route::get('/profuit/delete', [CartController::class, 'delete'])->name('cart/delete');
Route::get('/videpanier', function () {
    Cart::destroy();
    return redirect()->route('cart.index');
});
/**
 * Route panier
 */
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::get('/panier/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

/**
 * ******************************Route Admin*********************************************
 */

Route::get('/admin', [ProfileController::class, 'index'])->name('admin.index');

/**Produit */
Route::get('/admin/produit', [produitController::class, 'produit'])->name('admin.produit');
Route::get('/admin/produit/delete/{id}', [produitController::class, 'produitDeleteAdmin']);
Route::get('/admin/produit/detail/{id}', [produitController::class, 'produitDetailAdmin']);
Route::get('/admin/produit/edit/{id}', [produitController::class, 'produitEdit'])->name('admin.edit');
Route::post('/admin/produit/update/{id}', [produitController::class, 'produitUpdateAdmin'])->name('admin.update');
Route::get('/admin/produit/addEdit/', [produitController::class, 'produitAddEdit'])->name('admin.addEditProduit');
Route::post('/admin/produit/add', [produitController::class, 'produitAdd'])->name('admin.update');

/**Client */
Route::get('/admin/client', [clientController::class, 'clientAdmin'])->name('admin.client');
Route::get('/admin/user/edit/{id}', [clientController::class, 'editClient'])->name('admin.edit');
Route::post('/admin/user/update/{id}', [clientController::class, 'updateClient'])->name('admin.update');
Route::get('/admin/user/delete/{id}', [clientController::class, 'deleteClient'])->name('admin.delete');
Route::get('/admin/user/detail/{id}', [clientController::class, 'detailClient'])->name('admin.detail');
Route::get('/admin/user/addEdit', [clientController::class, 'addEditClient'])->name('admin.addEditClient');
Route::post('/admin/user/add', [clientController::class, 'addClient'])->name('admin.add');

/**Commande */
Route::get('/admin/commande/init', [commandeController::class, 'initCommande'])->name('admin.init');
Route::get('/admin/commandes/', [commandeController::class, 'commandes'])->name('admin.commandes');
Route::get('/admin/commandes/validate',[commandeController::class, 'validateCommande']);
Route::get('/admin/commande/edit/{id}', [commandeController::class, 'editCommande'])->name('admin.commande.edit');
Route::post('/admin/commande/editValidate/{id}', [commandeController::class, 'editCommandeValidate'])->name('admin.commande.editValidate');
Route::get('/admin/commande/delete/{id}', [commandeController::class, 'deleteCommande'])->name('admin.commande.delete');

require __DIR__.'/auth.php';
