@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/articlesbyid-bg.jpg') }}')">
        @endsection
        @section('titreheader')
            <h1>Articles unique</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">voici l'article</span>
            @endsection

            @section('contenu')
                    <!-- Articles par id -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="post-preview">

                            <h2 class="post-title">
                                {{$articles->title}}
                            </h2>

                            <h3 class="post-subtitle">
                                {{$articles->subtitle}}
                            </h3>

                            <p> {{$articles->message}}</p>
                            <p class="post-meta">Poste par <a href="{{ route('articlesbyauthor',['name'=>$articles->autor]) }}">{{$articles->autor}}</a> le : {{$articles->created_at}}</p>
                            <hr>

                            @if($articles->autor ==  Auth::user()->name) <!-- ne pas utiliser les doubles accolades dans la comparaison de string -->
                        </div>
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-default"><a href="{{ route('updateArticle',['id'=>$articles->id]) }}">Modifier</a></button>
                            <button type="button" class="btn btn-default" ><a href="{{ route('deleteArticle',['id'=>$articles->id]) }}" >Supprimer</a></button>

                        </div>
                        @else
                        @endif
                        <hr>
                        </div>
                    </div>
                </div>
            </div>
@endsection