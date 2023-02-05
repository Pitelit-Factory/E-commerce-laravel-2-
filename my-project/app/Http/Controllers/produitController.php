<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class produitController extends Controller
{

    
    public function allproduits(){
        $produit = produit::all();
        return view('produit/allProduit', ['produits' => $produit]);
    }

    public function produitDetail($id){
        $produit = produit::find($id);
        return view('produit/detailProduit', ['produit' => $produit]);
    }

    public function produitDelete($id){
        $produit = produit::find($id);
        $produit->delete();
        return redirect('/produit');
    }

    public function produitUpdate($id){
        $produit = produit::find($id);
        return view('produit/updateProduit', ['produit' => $produit]);
    }

    public function storeUpdate(Request $request){
        produit::where('id', $request->input('id'))->update($request);
        return redirect('/produit');
    }

    /**
     * *****Admin*****
     */

     public function produit(){
        $produits = produit::all();
        return view('admin.produit.produit', ['produits' => $produits]);
     }

     public function produitDeleteAdmin($id){
        produit::find($id)->delete();
        return Redirect::route('admin.produit');
     }

     public function produitDetailAdmin($id){
        $produit = produit::find($id);
        return view('admin.produit.detail', ['produit' => $produit]);
     }

     public function produitEdit($id){
        $produit = produit::find($id);
        
        return view('admin.produit.update', ['produit' => $produit]);
     }

     public function produitUpdateAdmin( Request $request, $id ){

        produit::where('id', $id)->update($request->except('_token'));
         
        return Redirect::route('admin.produit');
     }

     public function produitAddEdit(){
        return view('admin.produit.add');
     }

     public function produitAdd(Request $request){
        $produit = new produit;
        $produit->nom = $request->input("nom");
        $produit->prix = $request->input("prix");
        $produit->volume = $request->input("volume");
        $produit->poids = $request->input("poids");
        $produit->type = $request->input("type");
        $produit->save();
        return Redirect::route('admin.produit');

     }
}
