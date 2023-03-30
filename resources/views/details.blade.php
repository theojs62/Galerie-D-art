@extends("layouts.master")
    @if (!empty($artworks))
    <div class="entete">
        <h1>Liste des Oeuvres</h1>
        {{--<h3>Auteur(s) de l'oeuvre : {{ $artworks->authors }}</h3>--}}
    </div>
    <table>
        <thead>
        <th>#</th>
        <th>Nom</th>
        <th>Date d'ajout</th>
        </thead>
        @foreach ($artworks as $artwork)
            <tbody>
            <td>{{$artwork->id}}</td>
            <td>{{$artwork->name_artwork}}</td>
            <td>{{$artwork->date_artwork}}</td>
            @foreach($artwork->authors as $authors)
                <td>{{$authors->firstname_author}}</td>
            @endforeach
            <td><a href="{{route('artwork.show', $artwork->id)}}">Afficher oeuvre !</a></td>
            </tbody>
        @endforeach
    </table>
    @else
        <h1>L'oeuvre n'existe pas</h1>
    @endif


