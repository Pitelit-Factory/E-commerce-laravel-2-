<x-app-layout>


  @foreach(Cart::content() as $product)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->price}} €</p>
          <a href="/panier/delete/{{$product->rowId}}" class="btn btn-danger">Delete</a>
        </div>
      </div>
      @endforeach
      @if(Cart::content()->isEmpty())
      <div class="alert alert-danger">
        Le panier est vide
      </div>
      @else
      <a href="/videpanier"><input type="button" value="Vider panier" class="btn btn-primary"></a>
      <a href="/admin/commandes/validate"><input type="button" value="Valider commande" class="btn btn-primary"></a>
      @endif
</x-app-layout>