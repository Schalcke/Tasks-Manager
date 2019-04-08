@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="page-header">

        <span>
            @if(Auth::check() and $post->etat == 1)
			    <button type="button" class="btn btn-success pull-right">Tache faite</button>
        	@endif
			@if(Auth::check() and $post->etat == 0)
			    <button type="button" class="btn btn-danger pull-right"> Pas faite </button>
             @endif
        </span>

            <h1>{{ $post->titre }}</h1>
            <p><small>
                ID : <a href="#">{{ $post->id }}</a>,
                ID de l'auteur : <a href="#">{{ $post->user_id }}</a> 
                Ajouter le : <em>{{ $post->created_at }}</em>
                <span class="pull-right"> Expire le : <em>{{ $post->date_end }}</em></span>
            </small></p>
        </div>

        <article>
            <p>{{ $post->contenu }}</p>
        </article>

        @if(Auth::check() and Auth::user()->id == $post->user_id)
            <td>{!! link_to_route('post.edit', 'Modifier', [$post->id], ['class' => 'btn btn-warning pull-right']) !!}</td>
        @endif

        <br>
        <a href="javascript:history.back()"> < Retour à la liste des taches </a>
    </div>
</div>

</div><!-- /.container -->
@endsection