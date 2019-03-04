@extends('layouts.app')

@section('content')
    <div class="col-md-offset-3 col-md-6">
       <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Ajout d'une nouvelle tache </div>
            <div class="panel-body"> 
                    <div class="col-sm-12">
                        {!! Form::open(['route' => 'post.store', 'class' => 'form-horizontal panel']) !!}
                            <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                                {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                                {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
                                {!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
                                {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
                                {!! Form::number ('user_id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'User_id']) !!}
                                {!! $errors->first('user_id', '<small class="help-block">:message</small>') !!}
                            </div>
                            {!! Form::submit('Envoyer !', ['class' => 'btn btn-default pull-right']) !!}
                        {!! Form::close() !!}
			        </div>
            </div>
        </div>

        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection