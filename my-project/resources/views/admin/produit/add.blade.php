<x-app-layout>
    <form method="POST" action="/admin/produit/add" >
        @csrf
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-body">
                  <p><label>Nom :</label><input type='text'name='nom'></p>
                  <p><label>Prix :</label><input type='text' name='prix'></p>
                  <p><label>Volume :</label><input type='text' name='volume'></p>
                  <p><label>Poids :</label><input type='text' name='poids'></p>
                  <p><label>Type :</label><input type='text' name='type'></p>
                  <div class="d-flex justify-content-between align-items-center">
                      <button type="submit">Ajouter</button>
                    <div class="btn-group">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
</x-app-layout>