@extends('base')
<a href="/get-ajax">Ajax</a>
<p>Page tous les produits</p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">volume</th>
      <th scope="col">poids</th>
      <th scope="col">type</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      
      
    </tr>
  </thead>
  <!-- foreach produit -->
  @foreach($produits as $produit)
  <tbody>
    <tr>
      <th scope="row">{{$produit->id}}</th>
      <td>{{$produit->nom}}</td>
      <td>{{$produit->prix}}</td>
      <td>{{$produit->volume}}</td>
      <td>{{$produit->poids}}</td>
      <td>{{$produit->type}}</td>
      <td><button mat-button><a href="{{ route('produit.update', $produit->id)}}">Update</button></td>
      <td><button mat-button><a href="{{ route('produit.delete', $produit->id)}}">Delete</button></td>
    </tr>
    @endforeach
  </tbody>
</table>