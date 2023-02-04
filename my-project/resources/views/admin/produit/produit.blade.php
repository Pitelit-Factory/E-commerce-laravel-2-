<x-app-layout>  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">idProduit</th>
            <th scope="col">nom</th>
            <th scope="col">prix</th>
            <th scope="col">modifier</th>
            <th scope="col">supprimer</th>
            <th scope="col">détail</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
          <tr>
            <th scope="row">{{$produit->id}}</th>
            <td>{{$produit->nom}}</td>
            <td>{{$produit->prix}}</td>
            <td><a href="/admin/produit/edit/{{$produit->id}}">Modifier</td>
            <td><a href="/admin/produit/delete/{{$produit->id}}">Supprimer</a></td>
            <td> <a href="/admin/produit/detail/{{$produit->id}}">détail</a></td>
          </tr>
          @endforeach
          <div>
          </div>
        </tbody>
      </table>
      <a href="{{route('admin.addEditProduit')}}"><input type="button" class="btn btn-primary" value="Ajouter produit"></a>
</x-app-layout> 

