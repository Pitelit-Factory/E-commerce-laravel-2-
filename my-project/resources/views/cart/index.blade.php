<x-app-layout>

    @foreach(Cart::content() as $product)
    @empty(Cart::content())
      <div>
        <p>Le panier est vide</p>
        </div>
    @endempty
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->price}} €</p>
          <a href="{{route('cart.destroy', $product->rowId) }}" class="btn btn-danger">Delete</a>
        </div>
      </div>
@endforeach
</x-app-layout>