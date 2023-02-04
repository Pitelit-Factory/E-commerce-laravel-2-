<x-app-layout>
    <div class="album py-5 bg-light">
        <div class="container">
    <form method="POST" action="/admin/user/update/{{$user->id}}" >
        @csrf
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-body">
                  <p><label>email :</label><input type='text' name='email' value={{$user->email}}></p>
                  <p><label>phone :</label><input type='text' name='phone' value={{$user->phone}}></p>
                  <p><label>adresse :</label><input type='text' name='adresse' value={{$user->adresse}}></p>
                  <p><label>nbCommande :</label><input type='text' name='nbCommande' value={{$user->nbCommande}}></p>
                  <p><label>Role :</label><input type='text' name='Role' value={{$user->Role}}></p>
                  <div class="d-flex justify-content-between align-items-center">
                      <button type="submit">Sauvegarder</button>
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