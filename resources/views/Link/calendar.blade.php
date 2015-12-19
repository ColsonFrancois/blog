@extends('../template')

@section('photoheader')
    <header class="intro-header" style="background-image: url('{{ asset('img/connexion.jpg') }}')">

        @endsection
        @section('titreheader')
            <h1>Mon calendrier</h1>
        @endsection
        @section('commentaireheader')
            <span class="subheading">Historique de mes ecrits</span>
        @endsection
        @section('contenu')


@endsection
