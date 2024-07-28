@section('title',"Dashboard")
<div class="row">
  <div class="col-3 mb-4">
    <div class="card">
      <div class="card-body text-center text-dark pb-0">
        <i class='bx bxs-graduation bx-lg'></i>
        <h2 class="d-block fs-3 mt-1 text-dark">Enseignants</h2>
        <h2 class="fs-2 mt-1 text-dark">{{count($enseignants)}}</h2>
      </div>
      <div class="card-footer text-center text-dark">
        <a class="btn btn-primary" href="{{route('enseignants')}}">Afficher la liste</a>
      </div>
    </div>
  </div>
  <div class="col-3 mb-4">
    <div class="card">
      <div class="card-body text-center text-dark pb-0">
        <i class='bx bxs-school bx-lg'></i>
        <h2 class="d-block fs-3 mt-1 text-dark">Départements</h2>
        <h2 class="fs-2 mt-1 text-dark">{{count($departements)}}</h2>
      </div>
      <div class="card-footer text-center text-dark">
        <a class="btn btn-primary" href="{{route('departements')}}">Afficher la liste</a>
      </div>
    </div>
  </div>
  <div class="col-3 mb-4">
    <div class="card">
      <div class="card-body text-center text-dark pb-0">
        <i class='bx bxs-book-bookmark bx-lg'></i>
        <h2 class="d-block fs-3 mt-1 text-dark">Modules</h2>
        <h2 class="fs-2 mt-1 text-dark">{{count($modules)}}</h2>
      </div>
      <div class="card-footer text-center text-dark">
        <a class="btn btn-primary" href="{{route('modules')}}">Afficher la liste</a>
      </div>
    </div>
  </div>
  <div class="col-3 mb-4">
    <div class="card">
      <div class="card-body text-center text-dark pb-0">
        <i class='bx bxs-school bx-lg'></i>
        <h2 class="d-block fs-3 mt-1 text-dark">Les salles</h2>
        <h2 class="fs-2 mt-1 text-dark">{{count($salles)}}</h2>
      </div>
      <div class="card-footer text-center text-dark">
        <a class="btn btn-primary" href="{{route('salles')}}">Afficher la liste</a>
      </div>
    </div>
  </div>
</div>
  {{-- <div class="card">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table mytable table-sm text-center">
                  <thead>
                      <tr>
                        <th scope="col">Module</th>
                        <th scope="col">Type de module</th>
                        <th scope="col">Volume horaire</th>
                        <th scope="col">Coordinateur</th>
                        <th scope="col">Actions</th>
                      </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                  </tbody>
              </table>
          </div>
      </div>
  </div> --}}