@extends('template.login')

@section('content')

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST" action="{{ route('register') }}">
                @csrf
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="name" class="login__input @error('name') is-invalid @enderror" placeholder="Nom">
                    @error('name')
                    <br>
                    <span class="invalid-feedback alert alert-danger" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
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
					<input type="password" class="login__input @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Mot de passe">
                    @error('password')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ $message }}</strong>
                    </span>
                @enderror
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="password" placeholder="Confirmer mot de passe">


				</div>
				<button class="button login__submit">
					<span class="button__text">S'inscrire</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                <div style="margin: 12px; text-align:center">
                    <a href="{{route('login')}}" style="margin: 20px 5px; color:#fff; text-decoration:none"> Dèja un compte?</a>

                </div>

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
