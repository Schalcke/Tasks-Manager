@extends('layouts.app')

@section('content')
<div class="container">
    <header class="jumbotron">
      <div class="container">
        <h1 class="page-header">Welcome {!! Auth::user()->name !!} ! Vous ete sur l'application de gestionnaire des taches !</h1>
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <a href="http://127.0.0.1:8000/user" class="btn btn-primary pull-left"> Voir les utilisateurs </a>
                <a href="http://127.0.0.1:8000/post" class="btn btn-primary pull-right"> Voir les taches </a>
            </div>
        </div>
      </div>
    </header>
</div>
@endsection
