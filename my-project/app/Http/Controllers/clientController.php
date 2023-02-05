<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\client;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Session\Middleware\StartSession;

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

    /**
     * *****Admin*****
     */

     public function clientAdmin(){
        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
     }

     public function editClient($id){
        $user = User::find($id);

        return view('admin.users.editUser', ['user' => $user]);

     }

     public function updateClient(Request $request, $id){
        User::where('id', $id)->update($request->except('_token'));
        return Redirect::route('admin.client');
    }

    public function deleteClient($id){
        User::find($id)->delete();
        return Redirect::route('admin.users');
    }

    public function detailClient($id){
        $user = User::find($id);

        return view('admin.users.detail', ['user' => $user]);
    }

    public function addEditClient(){
        return view('admin.users.add');
    }

    public function addClient(Request $request){
        $client = new User;
        $client->name = $request->input("name");
        $client->email = $request->input("email");
        $client->password = Hash::make($request->input("password"));
        $client->phone = $request->input("phone");
        $client->adresse = $request->input("adresse");
        $client->nbCommande = $request->input("nbCommande");
        $client->Role = $request->input("Role");
        $client->save();
        return Redirect::route('admin.users');
    } 
}
