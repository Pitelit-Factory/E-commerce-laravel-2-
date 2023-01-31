<x-app-layout>
    <ul>
        <li><label>idclient : </label><input type='text' disabled='disabled' value='{{ $user->id}}'></li>
        <li><label>nom client : </label><input type='text' disabled='disabled' value='{{ $user->name}}'></li>
        <li><label>Mail client : </label><input type='text' disabled='disabled' value='{{ $user->email}}'></li>
        <li><label>Telephone : </label><input type='text' disabled='disabled' value='{{ $user->phone}}'></li>
        <li><label>Adresse : </label><input type='text' disabled='disabled' value='{{ $user->adresse}}'></li>
        <li><label>Nombre de commande passé : </label><input type='text' disabled='disabled' value='{{ $user->nbCommande}}'></li>
        <a class="btn btn-primary" href="{{route('account.update') }}">Ajouter/modifier info</a></li>
    </ul>
</x-app-layout>
