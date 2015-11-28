@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/admin.jpg') }}')">

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
                    <form role="form" method="post"
                          action="{{isset($article->id)? route('updateArticle',['id'=>$article->id]):route('createArticle')}}">
                        <!-- si il y a un id a l'article il s'agiy d'une modification et on envoie l'id dans l'url sinon il s'agit d'un ajout d'articles -->
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="InputName">Titre de l'article</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="Titre" id="Titre"
                                           value="{{ $article->title or '' }}"
                                           placeholder="Entrez le Titre de l'article" required>
                                    <!-- si on recupère le titre sinon on ne met rien -->
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputName">Sous-titre de l'article</label>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="sousTitre" id="sousTitre"
                                           value="{{ $article->subtitle or '' }}"
                                           placeholder="Entrez le Sous-titre de l'article" required>
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputMessage">Ecrivez votre article</label>

                                <div class="input-group">
                                    <textarea name="Message" id="Message" placeholder="Contenu de votre aticle"
                                              class="form-control" rows="10"
                                              required>{{$article->message or ''}}</textarea>
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-asterisk"></span></span>
                                </div>
                            </div>

                            <!-- on envoie le nom de l'auteur qui ecrit l'article -->
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <!-- Token pour sécurisé l'envoie des information -->
                            <input type="submit" name="submit" id="submit"
                                   value="{{ isset($article->id)?'Modifier':'Ecrire ' }}"
                                   class="btn btn-info pull-right">
                        </div>
                    </form>

                </div>
            </div>
@endsection