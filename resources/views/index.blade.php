@extends('layouts.app')

@section('content')
<div class="container">
	@if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
<h1>Liste des utilisateurs</h1>
<p>Vous éte sur l'application de gestionnaire des taches ! 
	Dans le tableau ci-dessous vous avez la liste des utilisateur et en fonction de votre status il vous est permis
	de  faire les choses suivantes : 
</p>
	<div class="row">
		<div class="col-md-4">
			<ul>
				<li>Voir les informaions relatives à un utilisateur comme son:
					<ul>
						<li>ID</li>
						<li>email</li>
						<li>Nom</li>
						<li>Son status :
							<ul>
								<li>Administrateur</li>
								<li>Utilisateur simple</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul>
				<li>Modifier  les informations relative à un utilisateur en fonction de certainnes critaires :
					<ul>
						<li>Un utilisateur simple ne peut modifier que ses propres information</li>
						<li>Un adminstrateur peut modifier les informations de tout le monde et peut données les droit d'adminstrateur à qui il veux</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul>
				<li>suprimer les informaions relatives à un utilisateur en fonction de certainnes critaires:
					<ul>
						<li>Un utilisateur simple ne peut suprimer que ses propres information</li>
						<li>Un adminstrateur peut suprimer les informations de n'importe quelle utilisateur</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<a href="http://127.0.0.1:8000/post" class="btn btn-primary pull-left"> Voir les taches </a>

	@if(Auth::check() and Auth::user()->admin)
		{!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-primary pull-right']) !!}
	@endif
	<br>


<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Inscrit le:</th>
			<th>Voir</th>
			<th>Modifier</th>
			<th>Suprimer</th>
		</tr>
	</thead>
	<tbody>
		<tbody>
			@foreach ($users as $user)
						<tr>
							<td>{!! $user->id !!}</td>
							<td>{!! $user->name !!}</td>
							<td>{!! $user->email !!}</td>
                            <td>{!! $user->created_at !!}</td>
							<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                            @if(Auth::check() and Auth::user()->admin)
							<td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
							<td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endif
						</tr>
					@endforeach
	  	</tbody>
	</table>

	{!! $links !!}
</div>
@endsection