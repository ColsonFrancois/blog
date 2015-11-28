<!doctype html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog</title>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/blog2.css') }}">


</head>
<body>
@if(Session::has('ok'))
    <h2>{{ Session::get('ok') }}</h2>
    @endif
            <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Mobile-->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



                    <a class="navbar-brand" href="{{ route('articles') }}">Fsociety</a>

            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    @if(Auth::check()) <!-- Si connecté il y a -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="adropdown" href="{{ route('administrateur') }}">Ecrire un article</a></li>
                            <li><a class="adropdown" href="{{ route('articlesbyauthor',['name'=>Auth::user()->name]) }}">Voir mes articles</a></li>
                            <li><a  class="adropdown" href="/auth/logout">Deconnexion</a></li>

                        </ul>
                    </li>
                    @else
                        @endif
                    <li>
                        <a href="{{ route('articles') }}">Articles</a>
                    </li>
                    <li><a href="{{ route('apropos') }}">A propos</a></li>
                    @if(Auth::check())
                    @else
                        <li>
                            <a href="{{ route('connexion') }}">Connexion</a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>

    </nav>
    <!-- Header Photo -->
    @yield('photoheader')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    @yield('titreheader')
                    <hr class="small">
                    @yield('commentaireheader')
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- Contenu -->
    @yield('contenu')


            <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Webmaster & Webdesigner : <a
                                href="https://www.facebook.com/francois.colson"> Colson Francois. </a></p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>