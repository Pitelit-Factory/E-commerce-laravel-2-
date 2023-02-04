<x-app-layout>  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">idCommande</th>
            <th scope="col">idClient</th>
            <th scope="col">date</th>
            <th scope="col">idetat</th>
            <th scope="col">modifier</th>
            <th scope="col">supprimer</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
          <tr>
            <th scope="row">{{$commande->id}}</th>
            <td>{{$commande->user_id}}</td>
            <td>{{$commande->created_at}}</td>
            <td>{{$commande->idEtat}}</td>
            <td><a href="/admin/commande/edit/{{$commande->id}}">Modifier</td>
            <td><a href="/admin/commande/delete/{{$commande->id}}">Supprimer</a></td>
          </tr>
          @endforeach
          <div>
          </div>
        </tbody>
      </table>
</x-app-layout> 

