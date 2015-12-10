@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/articlesbyid.jpg') }}')"/>
        @endsection
        @foreach($articles as $article)
        @section('titreheader')
            <h1>Un article de {{$article->autor}}</h1>
        @endsection

      @section('commentaireheader')
            <span class="subheading">{{$article->title}}</span>
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
                                le : {{ date('d-m-Y', strtotime($article->created_at)) }}&nbsp;&nbsp;
                                @if(Auth::check())
                                    @if($article->autor ==  Auth::user()->name)
                                <a href="{{ route('updateArticle',['id'=>$article->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('deleteArticle',['id'=>$article->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
                                    @else
                                    @endif
                                @endif
                            </p>





                        </div>
                        <hr>
                    </div>


                    <!-- Comments Form -->

                        <div class="container">

                        </div>
                    @if(Auth::check())
                        <div class="well">
                            <h4>Laissez un commentaire :</h4>

                            <form role="form" method="post" action="{{route('comment')}}">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="6" required></textarea>
                                </div>
                                <input type="hidden" name="article" value="{{$article->id}}">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <button type="submit" class="btn btn-primary">Commenter</button>
                            </form>
                        </div>
                    <hr>
                        @else
                        @endif
                        @endforeach
                        @foreach($comments as $comment)
                                <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="{{ route('articlesbyauthor',['name'=>$comment->autor]) }}">
                                <img class="media-object img-responsive" width="64" height="64" src="{{$comment->image}}" alt="">
                                <div class="media-body">
                                    <h4 class="media-heading"> {{$comment->autor}}  </a>&nbsp;
                            <small>{{ date('d-m-Y G:i:s', strtotime($comment->date)) }}</small>
                            </h4>
                            {{$comment->comment}}
                        </div>
                </div>
                @endforeach


                </div>
            </div>


            <hr>

@endsection
