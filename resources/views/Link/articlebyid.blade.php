@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/articlesbyid-bg.jpg') }}')">
        @endsection
        @section('titreheader')
            <h1>un article de {{$articles->autor}}</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">{{$articles->title}}</span>
            @endsection

            @section('contenu')
                    <!-- Articles par id -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="post-preview" class="well">

                            <h2 class="post-title">
                                {{$articles->title}}
                            </h2>

                            <h3 class="post-subtitle">
                                {{$articles->subtitle}}
                            </h3>

                            <p> {{$articles->message}}</p>

                            <p class="post-meta">Poste par <a
                                        href="{{ route('articlesbyauthor',['name'=>$articles->autor]) }}">{{$articles->autor}}</a>
                                le : {{$articles->created_at}}</p>

                            @if(Auth::check())
                            @if($articles->autor ==  Auth::user()->name) <!-- ne pas utiliser les doubles accolades dans la comparaison de string -->

                            <div class="btn-group" role="group" >
                                <a href="{{ route('updateArticle',['id'=>$articles->id]) }}">
                                    <button type="button" class="btn btn-default">Modifier</button>
                                </a>
                                <a href="{{ route('deleteArticle',['id'=>$articles->id]) }}">
                                    <button type="button" class="btn btn-default">Supprimer</button>
                                </a>

                            </div>
                            @else
                            @endif
                            @else
                            @endif
                        </div>
                        <hr>
                    </div>


                    <!-- Comments Form -->
                    @if(Auth::check())
                        <div class="container">

                        </div>
                        <div class="well">
                            <h4>Laissez un commentaire :</h4>

                            <form role="form" method="post" action="{{route('comment')}}">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="6" required></textarea>

                                </div>
                                <input type="hidden" name="article" value="{{$articles->id}}">
                                <input type="hidden" name="autor" value="{{Auth::user()->id}}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <button type="submit" class="btn btn-info pull-right">Ecrire</button>
                            </form>
                        </div>
                    @else
                    @endif
                </div>
            </div>


            <hr>
@endsection