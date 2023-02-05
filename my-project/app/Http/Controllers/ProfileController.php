<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produit;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function account(Request $request){
        $user = Auth::user();
        return view('profile.account', [
            'user'=>$user
        ]);
    }

    public function updateAccount(Request $request){
        $user = Auth::user();
        return view('profile.accountUdpate',['user'=>$user]);
    }
    public function updateAccountValidate(Request $request){
        $user = Auth::user();
        $user->phone = $request->phone;
        $user->adresse = $request->adresse;
        $user->save();
        return Redirect::route('account');

    }

    /**
     * ********************Admin*****************************
     */

     public function index(){
        return view('admin.index');
     }

     /**Client */
     public function client(){
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
