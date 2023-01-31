<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;

class clientController extends Controller
{
    public function client(){
        return view('client');
    }

    public function inscription(){
        return view('/client/inscription');
    }

    public function incriptionReçu(Request $request){
         $client = new client;
         $client->nom = $request->nom;
         $client->prenom = $request->prenom;
         $client->Email = $request->Email;
         $client->mdp = bcrypt($request->mdp);
        $client->save();
        return redirect('/connexion');
    }

    public function connexion(){
        Auth::attempt();
        return view('/client/connexion');
    }

    public function connexionReçu(Request $request){
        // 
        $client = client::where('Email', $request->Email)->get()->first();
        $email = $client->Email;
        $mdp = $client->mdp;
        if(bcrypt($mdp) == $request->mdp){
            session_start();
            $_SESSION['client'] = $client;
        }
        return redirect('/index');
        
        // $_SESSION['client'] = $request->Email;
    }

    public function account(){
        print_r($_SESSION['client']);
        // return view('/client/account', ['session' => $_SESSION['client']]);
    }
}
