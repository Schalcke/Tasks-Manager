@extends('layouts.app')

@section('content')
    <div class="col-md-offset-3 col-md-6">
        <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Fiche d'utilisateur</div>
            <div class="panel-body"> 
                <p>ID : {{ $user->id }}</p>
                <p>Nom : {{ $user->name }}</p>
                <p>Email : {{ $user->email }}</p>
                @if($user->admin == 1)
                    Administrateur
                @endif

                @if(Auth::check() and Auth::user()->id == $user->id)
                    {!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning pull-right']) !!}
                @endif
            </div>
        </div>              

        <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection