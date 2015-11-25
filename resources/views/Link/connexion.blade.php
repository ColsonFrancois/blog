@extends('../template')
@section('photoheader')
<header class="intro-header" style="background-image: url('img/header-bg.jpg')">
    @endsection
    @section('titreheader')
        <h1>Connectez-vous</h1>
    @endsection
    @section('commentaireheader')
        <span class="subheading">Connectez vous a mon monde</span>
@endsection
    @section('contenu')
        <div class="container">
            <div class="row">
                <form role="form" method="post" >
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="motdepasse"  placeholder="Mot de passe" required>
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
                <a href="{{ route('register') }}" class="pull-right">Pas encore inscrit ? </a>
            </div>
        </div>
    </div>

@endsection
