@extends('base')
<h2>Update produit </h2>
<table class="table">
  <thead>
    <tr>
      <th><input type='text' value='{{$produit->id}}'></input></th>
    </tr>
  </thead>
  <thead>
    <tr>
    <th><input type='text' value='{{$produit->nom}}'></input></th>
    </tr>
  </thead>
  <thead>
    <tr>
    <th><input type='text' value='{{$produit->prix}}'></input></th>
    </tr>
  </thead>
  <thead>
    <tr>
    <th><input type='text' value='{{$produit->volume}}'></input></th>
    </tr>
</thead>
<thead>
  <tr>
  <th><input type='text' value='{{$produit->poids}}'></input></th>
  </tr>
</thead>
  <thead>
    <tr>
    <th><input type='text' value='{{$produit->type}}'></input></th>
    </tr>
   
  </thead>
  <thead>
    <tr>
  <th><a href="{{route('produit.store')}}">Enregistrer</a></th>
</tr>
</thead>
</table>