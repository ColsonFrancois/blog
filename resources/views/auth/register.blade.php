@extends('../template')
@section('Liensconnexion')
	<a href="{{ route('connexion') }}">Connexion</a>
@endsection
@section('photoheader')
	<header class="intro-header" style="background-image: url('img/inscription.jpg')">
		@endsection
		@section('titreheader')
			<h1>Inscrivez-vous</h1>
		@endsection
		@section('commentaireheader')
			<span class="subheading">Partagez vos emotions</span>
		@endsection
		@section('contenu')
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoopss !</strong>something went wrong.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="container">
						<div class="row">
							<form role="form" method="post" action="/auth/register" >
								<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" name="name" placeholder="Votre pseudo" value="{{ old('name') }}" required >
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" name="email" placeholder="Votre Email" value="{{ old('email') }}" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" name="image" placeholder="Lien de votre image de profil">
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="password" class="form-control" name="password"  placeholder="Votre mot de passe" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="password" class="form-control" name="password_confirmation"  placeholder="Retapez votre mot de passe" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<input type="hidden" name="_token" value="{!! csrf_token() !!}"> <!-- Token pour sécurisé l'envoie des information -->
									<input type="submit" name="submit" id="submit" value="Inscription"  class="btn btn-info pull-right">
								</div>
							</form>
						</div>
					</div>
@endsection
