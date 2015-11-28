@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/artbyauth-bg.jpg') }}')">
        @endsection
        @section('titreheader')
            <h1>Mon monde</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">Voici mes ecrits</span>
            @endsection

            @section('contenu')
                    <!-- Articles -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                        @foreach($articles as $article)
                            <div class="post-preview">
                                <a href="{{route('articlebyid',['id'=>$article->id])}}">
                                    <h2 class="post-title">
                                        {{$article->title}}
                                    </h2>

                                    <h3 class="post-subtitle">
                                        {{$article->subtitle}}
                                    </h3>
                                </a>

                                <p> {{$article->message}}</p>
                                @if(Auth::check())
                                @if($article->autor ==  Auth::user()->name) <!-- ne pas utiliser les doubles accolades dans la comparaison de string -->
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="{{ route('updateArticle',['id'=>$article->id]) }}"><button type="button" class="btn btn-default">Modifier</button></a>
                                    <a href="{{ route('deleteArticle',['id'=>$article->id]) }}" ><button type="button" class="btn btn-default" >Supprimer</button></a>

                                </div>
                                @else
                                @endif
                                @else
                                    @endif

                                <hr>
                            </div>
                            @endforeach
                                    <!-- Pager -->
                            <ul class="pagination pagination-lg">

                                {!! $articles->render() !!}

                            </ul>


                    </div>
                </div>
            </div>

            <hr>

@endsection