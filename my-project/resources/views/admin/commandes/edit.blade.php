<x-app-layout>  
    <form action="/admin/commande/editValidate/{{$commande->id}}" method="POST">
        @csrf
    <table class="table">
        <thead>
          <tr>
            <th scope="col">idCommande</th>
            <th scope="col">idClient</th>
            <th scope="col">date</th>
            <th scope="col">idetat</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">{{$commande->id}}</th>
            <td>{{$commande->user_id}}</td>
            <td>{{$commande->created_at}}</td>
            <td><input type="text" value={{$commande->idEtat}} name='idEtat'></td>
            <td><input type="submit" value='valider'></td>
          </tr>
          <div>
          </div>
        </tbody>
      </table>
    </form>
</x-app-layout> 

