@extends('../template')
@section('photoheader')
<header class="intro-header" style="background-image: url('img/bg.jpg')">
    @endsection
@section('titreheader')
    <h1>Articles</h1>
    @endsection
@section('commentaireheader')
<span class="subheading">Une autre perception du monde</span>
    @endsection

    @section('contenu')
            <!-- Articles -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">


                    @foreach($articles as $article)
                            <div class="post-preview">
                                <a href="post.html">
                                    <h2 class="post-title">
                                    {{$article->title}}
                                    </h2>
                                    <h3 class="post-subtitle">
                                        {{$article->subtitle}}
                                    </h3>
                                </a>
                                    <p> {{$article->message}}</p>

                                <p class="post-meta">Poste par <a href="{{ route('apropos') }}">{{$article->autor}}</a> le : {{$article->created_at}}</p>
                            </div>

                            <hr>
                            @endforeach


                    <!-- Pager -->
                    <ul class="pager">
                        <li class="next">
                            <a href="#">Older Posts &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr>

@endsection