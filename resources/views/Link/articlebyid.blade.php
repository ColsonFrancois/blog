@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/articlesbyid-bg.jpg') }}')">
        @endsection
        @foreach($articles as $article)
        @section('titreheader')
            <h1>Un article de {{$article->autor}}</h1>
        @endsection

      @section('commentaireheader')
            <span class="subheading">{{$article->subtitle}}</span>
            @endsection

            @section('contenu')

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="post-preview" class="well">

                            <h2 class="post-title">
                                {{$article->title}}
                            </h2>

                            <h3 class="post-subtitle">
                                {{$article->subtitle}}
                            </h3>

                            <p> {{$article->message}}</p>

                            <p class="post-meta">Poste par <a
                                        href="{{ route('articlesbyauthor',['name'=>$article->autor]) }}">{{$article->autor}}</a>
                                le : {{$article->created_at}}</p>

                            @if(Auth::check())
                            @if($article->autor ==  Auth::user()->name) <!-- ne pas utiliser les doubles accolades dans la comparaison de string -->

                            <div class="btn-group" role="group" >
                                <a href="{{ route('updateArticle',['id'=>$article->id]) }}">
                                    <button type="button" class="btn btn-default">Modifier</button>
                                </a>
                                <a href="{{ route('deleteArticle',['id'=>$article->id]) }}">
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
                                <input type="hidden" name="article" value="{{$article->id}}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <button type="submit" class="btn btn-info pull-right">Ecrire</button>
                            </form>
                        </div>
                        @else
                        @endif
@endforeach
                        @foreach($comments as $comment)
                                <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                                <div class="media-body">
                                    <h4 class="media-heading"> {{$comment->autor}}  </a>
                            <small>{{$comment->date}}</small>
                            </h4>
                            {{$comment->comment}}
                        </div>
                </div>
                @endforeach


                </div>
            </div>


            <hr>

@endsection
