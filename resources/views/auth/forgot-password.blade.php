@extends("auth.authlayout")
@section("title","Réinitialiser le mot de passe")
@section("content")
  @if(Session::has('status'))
    <p class="alert alert-success">Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail.</p>
  @else
    <p class="alert alert-danger">Veuillez vérifier votre boîte de réception</p>
  @endif
  <!-- Forget password Card -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/logo.png')}}" width="100">
          </span>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Mot de passe oublié? 🔒</h4>
        <p class="mb-4">Entrez votre email et nous vous enverrons des instructions pour réinitialiser votre mot de passe</p>
        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{old('email')}}"
                    placeholder="Entrer votre Email"
                    autofocus
                    required/>
            </div>
            @error('email')
                <div class="alert alert-danger my-1">Votre email incorrect</div>
            @enderror
            <button class="btn btn-primary d-grid w-100">Envoyer le lien de réinitialisation</button>
        </form>
        <div class="text-center">
            <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>Retour connexion
            </a>
        </div>
      </div>
    </div>
  <!-- Forget password Card -->
@endsection
