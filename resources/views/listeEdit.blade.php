@extends('layouts.app')

@section('content')
    <div class="col-md-offset-3 col-md-6">
       <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Modification d'un utilisateur</div>
            <div class="panel-body"> 
                <div class="col-sm-12">
                    {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                        {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                                {!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
                                {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
                        {!! Form::number ('user_id', $post->user_id, ['class' => 'form-control', 'placeholder' => 'User_id']) !!}
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