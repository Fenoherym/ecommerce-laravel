@extends('template.login')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Se connecter</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Votre adresse email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Votre mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Se connecter
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST" action="{{ route('login') }}">
                @csrf
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="email" class="login__input @error('email') is-invalid @enderror" placeholder="Email">
                    @error('email')
                    <br>
                    <span class="invalid-feedback alert alert-danger" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe">
                    @error('password')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
				</div>
				<button class="button login__submit">
					<span class="button__text">Se connecter</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<button class="button login__submit">
					<span class="button__text"><a href="{{ route('register') }}"> S'inscrire</a></span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
			</form>
			{{-- <div class="social-login">
				{{-- <h3>log in via</h3> --}}
				{{-- <div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div> --}}
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>
</div>
@endsection
