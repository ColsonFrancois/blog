@extends('../template')
@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/articlesbyauthor.jpg') }}')">
        @endsection
        @section('titreheader')
            <h1>Mon monde</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">Voici mes ecrits</span>
            @endsection

            @section('contenu')

            <div class="container">
                <!-- Page Header -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{$nom}}
                        </h1>
                        <br>
                    </div>
                </div>
                <div class="row">

                    @foreach($articles as $article)
                    <div id="mesarticles" class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <a href="{{route('articlebyid',['id'=>$article->id])}}">
                    <u>
                            <img id="imgvinyl" class="img-responsive" src="{{$article->image}}" alt="">

                            <span class="img-responsive" id="vinyl" style=" background: url('{{ asset('img/vinyl.png') }}'); "></span>
                    </u>
                        </a>

                        <h6  class="post-subtitle">
                           {{$article->title}}&nbsp;&nbsp;
                            @if(Auth::check())
                            @if($article->autor ==  Auth::user()->name)
                           <a href="{{ route('updateArticle',['id'=>$article->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;&nbsp;
                           <a href="{{ route('deleteArticle',['id'=>$article->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
                                @else
                            @endif
                                @else
                            @endif

                        </h6>




                </div>
                        @endforeach
    </div>
                <!-- Pager -->
                <ul class="pagination pagination-lg">

                    {!! $articles->render() !!}

                </ul>


@endsection