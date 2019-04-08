@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">

            <div class="container">
                <header class="jumbotron">
                    <div class="container">
                        <p class="page-header">Vous ete sur l'application de gestionnaire des taches !
                        Dans cette application il est question d'ajouter de modifier et de visualisser des taches que vous ou un autre menbre 
                        a ajouté. Ces taches sont ajoutés selon une logique.
                            <div class="row">
                                <div class="col-md-3">
                                    <ul>
                                        <li>Une tache a un :
                                            <ul>
                                                <li>Id</li>
                                                <li>Titre</li>
                                                <li>User_ID</li>
                                                <li>Contenu</li>
                                                <li>date de début</li>
                                                <li>date de fin</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="col-md-3">
                                    <ul>
                                        <li>Une tache a deux status :
                                            <ul>
                                                <li>Tache faite</li>
                                                <li>Tache pas encore faite</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                <em>En fonction du status et de la date de fin une </em>
                                    <ul>
                                        <li>Si une tache est faite avant sa date de fin
                                            <ul>
                                                <li>Elle est bien validée</li>
                                            </ul>
                                        </li>
                                        <li>Si une tache est faite et que le délais est dépassé
                                            <ul>
                                                <li>Elle est terminer</li>
                                            </ul>
                                        </li>
                                        <li>Si une tache est n'est pas encore faite et qu'on est dans les délais
                                            <ul>
                                                <li>Elle est a faire</li>
                                            </ul>
                                        </li>
                                        <li>Si une tache est n'est pas encore faite et qu'on a dépassé les délais
                                            <ul>
                                                <li>Elle est pas validée</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </p>

                        @if (Route::has('login'))
                            @if (Auth::check())
                                <a href="{{ url('/home') }}">Accueil</a>
                            @else
                                <a href="{{ url('/login') }}">Connexion</a>
                                <a href="{{ url('/register') }}">Inscription</a>
                            @endif
                        @endif
                    </div>
                </header>
            </div>
@endsection
