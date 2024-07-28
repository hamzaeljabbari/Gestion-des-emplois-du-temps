@extends("auth.authlayout")
@section("title","Se Connecter")
@section("content")
  <!-- Register -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/logo.png')}}" width="150">
          </span>
        </div>
        <!-- /Logo -->

        <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
          @csrf
          @error('email')
            <div class="alert alert-danger my-1">Votre email ou mot de passe incorrect</div>
          @enderror
          @error('password')
            <div class="alert alert-danger my-1">Votre email ou mot de passe incorrect</div>
          @enderror
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="Entrer votre email"
              autofocus/>
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Mot de passe</label>
                @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    <small>Mot de passe oublié?</small>
                  </a>
              @endif
            </div>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
              />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Se Connecter</button>
          </div>
        </form>

        <p class="text-center">
          <span>Nouveau sur notre plateforme?</span>
          <a href="{{route('register')}}">
            <span>Créer un compte</span>
          </a>
        </p>
      </div>
    </div>
  <!-- /Register -->
@endsection