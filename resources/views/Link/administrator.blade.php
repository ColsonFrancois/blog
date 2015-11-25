@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('img/admin.jpg')">
        @endsection
        @section('titreheader')
            <h1>Administration</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">Ecrivez votre article</span>
@endsection

@section('contenu')
            <div class="container">
                <div class="row">
                    <form role="form" method="post" action="{{route('createArticle')}}">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="InputName">Titre de l'article</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="Titre" id="Titre" placeholder="Entrez le Titre de l'article" required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputName">Sous-titre de l'article</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sousTitre" id="sousTitre" placeholder="Entrez le Sous-titre de l'article" required>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputMessage">Ecrivez votre article</label>
                                <div class="input-group">
                                    <textarea name="Message" id="Message" placeholder="Contenu de votre aticle" class="form-control" rows="9" required></textarea>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"> <!-- Token pour sécurisé l'envoie des information -->
                            <input type="submit" name="submit" id="submit" value="Ecrire"  class="btn btn-info pull-right">
                        </div>
                    </form>

                </div>
            </div>
@endsection