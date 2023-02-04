<x-app-layout>
    <form method="POST" action="/admin/user/add" >
        @csrf
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-body">
                    <p><label>Nom :</label><input type='text' name='name' ></p>
                    <p><label>email :</label><input type='text' name='email' ></p>
                    <p><label>password :</label><input type='password' name='password' ></p>
                    <p><label>phone :</label><input type='text' name='phone' ></p>
                    <p><label>adresse :</label><input type='text' name='adresse' ></p>
                    <p><label>nbCommande :</label><input type='text' name='nbCommande'></p>
                    <p><label>Role :</label><input type='text' name='Role' ></p>
                    <div class="d-flex justify-content-between align-items-center">
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