<x-app-layout>
    <form action="/account/update/validate" method="POST">
        @csrf
    <ul>
        <li><label>idclient : </label><input type='text' name="id"  disabled='disabled' value='{{ $user->id}}'></li>
        <li><label>nom client : </label><input type='text' name="name" disabled='disabled' value='{{ $user->name}}'></li>
        <li><label>Mail client : </label><input type='text' name="email" disabled='disabled' value='{{ $user->email}}'></li>
        <li><label>Telephone : </label><input type='text' name="phone"  value='{{ $user->phone}}'></li>
        <li><label>Adresse : </label><input type='text' name="adresse"  value='{{ $user->adresse}}'></li>
        <li><label>Nombre de commande passé : </label><input type='text' disabled='disabled' value='{{ $user->nbCommande}}'></li>
        <input class="btn btn-primary" value="Sauvegarder" type="submit">
    </ul>
    </form>
</x-app-layout>
