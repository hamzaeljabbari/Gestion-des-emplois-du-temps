@extends("auth.authlayout")
@section("title","Réinitialiser le mot de passe")
@section("content")

  <!-- Reset password Card -->
    <div class="card">
      <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
          <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/logo.png')}}" width="100">
          </span>
        </div>
        <!-- /Logo -->
        <form id="formAuthentication" method="POST" action="{{ route('password.store') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input  type="email" 
                        class="form-control" 
                        id="email" name="email" 
                        placeholder="Entrer votre email" 
                        value="{{old('email', $request->email)}}" 
                        required autocomplete="username"/>
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
                    autocomplete="new-password"/>
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
                    required autocomplete="new-password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('password_confirmation')
                <div class="alert alert-danger my-1">Le mot de passe doit être identique</div>
                @enderror
            </div>

          <button class="btn btn-primary d-grid w-100">Réinitialiser le mot de passe</button>
        </form>
      </div>
    </div>
  <!-- Reset password Card -->
@endsection
