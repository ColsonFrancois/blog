@extends('../template')
@section('photoheader')
	<header class="intro-header" style="background-image: url('img/connexion-bg.jpg')">
		@endsection
		@section('titreheader')
			<h1>Connectez-vous</h1>
		@endsection
		@section('commentaireheader')
			<span class="subheading">Connectez vous a mon monde</span>
		@endsection
@section('contenu')

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oupss !</strong>Une erreur est survenue.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="container">
						<div class="row">
							<form role="form-group" method="post" action="/auth/login" >
								<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
										</div>
									</div>
									<input type="hidden" name="_token" value="{!! csrf_token() !!}"> <!-- Token pour sécurisé l'envoie des information -->
									<input type="submit" name="submit" id="submit" value="Connexion"  class="btn btn-info pull-right">
								</div>
							</form>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
								<a style="margin-top: 20px" href="{{ route('register') }}" class="pull-right"><u>Pas encore inscrit ?</u> </a>
							</div>
						</div>
					</div>


@endsection
