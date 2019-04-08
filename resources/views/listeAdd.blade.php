@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Ajouter une nouvelle tache</h1>
        <a href="javascript:history.back()"> < Retour à la liste des taches </a>

            <div class="row">
                {!! Form::open(['route' => 'post.store', 'class' => '']) !!}
                    <div class="form-group col-md-6 {!! $errors->has('titre') ? 'has-error' : '' !!}">
                        <label>Titre :</label>
                        {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group col-md-6 {!! $errors->has('date_end') ? 'has-error' : '' !!}">
                        <label>Expire le :</label>
                        {!! Form::date ('date_end', null, ['class' => 'form-control', 'placeholder' => 'Date de fin']) !!}
                        {!! $errors->first('date_end', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group col-md-12 {!! $errors->has('contenu') ? 'has-error' : '' !!}">
                        <label>Contenu :</label>
                        {!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
                        {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}

    </div>
@endsection