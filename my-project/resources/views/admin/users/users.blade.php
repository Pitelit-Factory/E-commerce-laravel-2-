<x-app-layout>  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">idClient</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">telephone</th>
            <th scope="col">adresse</th>
            <th scope="col">password</th>
            <th scope="col">idRole</th>
            <th scope="col">Nb commande</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->adresse}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->Role}}</td>
            <td>{{$user->nbCommande}}</td>
            <td><a href="/admin/user/edit/{{$user->id}}">Modifier</td>
            <td><a href="/admin/user/delete/{{$user->id}}">Supprimer</a></td>
            <td> <a href="/admin/user/detail/{{$user->id}}">détail</a></td>
          </tr>
          @endforeach
          <div>
          </div>
        </tbody>
      </table>
      <a href="{{route('admin.addEditClient')}}"><input type="button" class="btn btn-primary" value="Ajouter Client"></a>
</x-app-layout> 

