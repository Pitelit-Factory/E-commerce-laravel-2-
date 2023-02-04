<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produit;
use App\Models\Commande;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\ProfileUpdateRequest;

class commandeController extends Controller
{

    public function commandes(){
        $commandes = Commande::all();
        return view('admin.commandes.commandes', ['commandes' => $commandes]);
    }

    public function addCommande(Request $request){
        $commandes = new Commande;
        $commandes->user_id = $request->input('user_id');
        $commandes->idEtat = $request->input('idEtat');
        $commandes->save();
    }

    public function initCommande(){
        $commandes = new Commande;
        $commandes->user_id = Auth::id();
        $commandes->idEtat = 0;
        $commandes->save();

    }

    public function validateCommande(){
        $user = User::find(Auth::id());
        Cart::destroy();
        $commandes = new Commande;
        $commandes->user_id = Auth::id();
        $commandes->idEtat = 1;
        $commandes->save();
        $user->nbCommande = $user->nbCommande+1;
        $user->save();
        
        return Redirect::route('dashboard');
    }

    public function editCommande($id){
        $commande = commande::find($id);
        return view('admin.commandes.edit', ['commande' => $commande]);
    }

    public function editCommandeValidate(Request $request, $id){
        $commande = commande::find($id);
        $commande->idEtat = $request->idEtat;
        $commande->save();
        return Redirect::route('admin.commandes');
    }

    public function deleteCommande($id){
        commande::find($id)->delete();
        return Redirect::route('admin.commandes');
    }
}
