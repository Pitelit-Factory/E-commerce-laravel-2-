<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;

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
}
