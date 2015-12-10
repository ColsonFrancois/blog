@extends('../template')

@section('photoheader')
    <header class="intro-header" style="background-image: url('img/articles.jpg')">
        @endsection
        @section('titreheader')
            <h1>A propos</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">Qui suis-je ?</span>
@endsection
@section('contenu')
            <section id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>COLSON Francois</h2>
                            <h3 class="section-subheading text-muted">Technique Informatique 2015-2016</h3>
                          <a href="https://github.com/ColsonFrancois/blog"><h3 id="hovertitle" class="section-subheading text-muted"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Lien GitHub</h3></a>

                        </div>
                    </div>

                </div>
            </section>
    @endsection