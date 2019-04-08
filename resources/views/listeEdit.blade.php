@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la tache</h1>
        <a href="javascript:history.back()"> < Retour à la liste des taches </a>

        {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put', 'class' => '']) !!}
            <div class="row">
                <div class="form-group col-md-6 {!! $errors->has('name') ? 'has-error' : '' !!}">
                    <label>Titre :</label>
                    {!! Form::text('titre', $post->titre, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                    {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group col-md-2 {!! $errors->has('user_id') ? 'has-error' : '' !!}">
                    <label>ID de l'auteur :</label>
                    {!! Form::number ('user_id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'User_id']) !!}
                    {!! $errors->first('user_id', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group col-md-3 {!! $errors->has('date_end') ? 'has-error' : '' !!}">
                    <label>Expire le :</label>
                    {!! Form::dateTime ('date_end', $post->date_end, ['class' => 'form-control', 'placeholder' => 'Date de fin']) !!}
                    {!! $errors->first('date_end', '<small class="help-block">:message</small>') !!}
                </div> 
                <div class="checkbox form-group col-md-1">
                    <label>Etat :</label>
                    <label>
                        {!! Form::checkbox('etat', 1, null) !!} Faite
                    </label>
                </div> 
            </div>
                <div class="form-group col-md-12 {!! $errors->has('email') ? 'has-error' : '' !!}">
                    <label for="PostContent">Content :</label>
                    {!! Form::textarea ('contenu', $post->contenu, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}                        {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                </div>
            <div class="row">
                {!! Form::submit('Modifier !', ['class' => 'btn btn-primary pull-right']) !!}
            </div>
        {!! Form::close() !!}


    </div>
@endsection