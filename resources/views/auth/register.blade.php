@extends("auth.authlayout")
@section("title","Nouveau compte")
@section("content")
  <!-- Login Card -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/logo.png')}}" width="100">
          </span>
        </div>
        <!-- /Logo -->
        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nom et prénom</label>
            <input
              type="text"
              class="form-control"
              id="name"
              value="{{old('name')}}"
              name="name"
              placeholder="Entrer votre nom et prénom"
              autofocus
              autocomplete="name"
            />
            @error('name')
                <div class="alert alert-danger my-1">Veuillez entrer votre nom </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre email" value="{{old('email')}}" required autocomplete="username"/>
            @error('email')
              <div class="alert alert-danger my-1">Veuillez entrer votre email </div>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Mot de passe</label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
                autocomplete="new-password"
              />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password')
              <div class="alert alert-danger my-1">Veuillez entrer votre mot de passe </div>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Confirmez votre mot de passe</label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password_confirmation"
                class="form-control"
                name="password_confirmation" 
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
                required autocomplete="new-password"
              />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password_confirmation')
              <div class="alert alert-danger my-1">Le mot de passe doit être identique</div>
            @enderror
          </div>

          <button class="btn btn-primary d-grid w-100">Inscrire</button>
        </form>

        <p class="text-center">
          <span>Vous avez déjà un compte?</span>
          <a href="{{route('login')}}">
            <span>Se Connecter</span>
          </a>
        </p>
      </div>
    </div>
  <!-- Login Card -->
@endsection