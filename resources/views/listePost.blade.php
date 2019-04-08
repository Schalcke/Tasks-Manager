@extends('layouts.app')

@section('content')
<div class="container">
<h1>Liste des taches !</h1>
<p>Vous ete sur l'application de gestionnaire des taches ! Dans cette application il 
	est question d'ajouter de modifier et de visualisser des taches que vous ou un autre menbre a ajouté. 
	Ces taches sont ajoutés selon une logique que vous pouvez trouver 
	<a href="http://127.0.0.1:8000/"> ici </a>.
</p>

	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif

	<a href="http://127.0.0.1:8000/user" class="btn btn-primary pull-left"> Voir les utilisateurs </a>
	@if(Auth::check())
			{!! link_to_route('post.create', 'Ajouter une tache', [], ['class' => 'btn btn-primary pull-right']) !!}
	@endif


<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titre</th>
            <th>Ajouter le:</th>
			<th>Expire le:</th>
			<th>Voir</th>
			<th>Modifier</th>
			<th>Suprimer</th>
			<th>Etat</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<tbody>
		@foreach ($posts as $post)
			<tr>
				<td>{!! $post->id !!}</td>
				<td>{!! $post->titre !!}</td>
                <td>{!! $post->created_at !!}</td>
				<td>{!! $post->date_end !!}</td>
				<td>{!! link_to_route('post.show', 'Voir', [$post->id], ['class' => 'btn btn-success btn-block']) !!}</td>
					@if((Auth::check() and Auth::user()->admin) || Auth::user()->id == $post->user_id)
						<td>{!! link_to_route('post.edit', 'Modifier', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
					@elseif((Auth::check() || Auth::user()->id != $post->user_id))
						<td><button type="button" class="btn btn-warning btn-block disabled"> Modifier </button></td>
                    @endif
					@if((Auth::check() and Auth::user()->admin) || Auth::user()->id == $post->user_id)
						<td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet tache ?\')']) !!}
                            {!! Form::close() !!}
					@elseif((Auth::check() || Auth::user()->id != $post->user_id))
							<td><button type="button" class="btn btn-danger btn-block disabled"> Suprimer </button></td>
                        </td>
					@endif
					@if(Auth::check() and $post->etat == 1)
						<td><button type="button" class="glyphicon glyphicon-thumbs-up btn btn-success"></button></td>
					@elseif(Auth::check() and $post->etat == 0)
						<td><button type="button" class="glyphicon glyphicon-thumbs-down btn btn-danger"></button></td>
                    @endif
					@if((Auth::check() and $post->etat == 1) and $post->date_end < date('Y-m-d H:i:s'))
						<td><button type="button" class="btn btn-info"> Terminer </button></td>
					@elseif((Auth::check() and $post->etat == 1) and $post->date_end > date('Y-m-d H:i:s'))
						<td><button type="button" class="btn btn-success"> Bien valider </button></td>
					@elseif((Auth::check() and $post->etat == 0) and $post->date_end > date('Y-m-d H:i:s'))
						<td><button type="button" class="btn btn-primary"> A Faire </button></td>
					@elseif((Auth::check() and $post->etat == 0) and $post->date_end < date('Y-m-d H:i:s'))
						<td><button type="button" class="btn btn-danger"> Non valider </button></td>
					@endif
				</tr>
			@endforeach
	  	</tbody>
	</table>

	{!! $links !!}
</div>
@endsection