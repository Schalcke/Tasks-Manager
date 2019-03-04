@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <br>
    <div class="col-md-offset-2 col-md-8">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des utilisateurs</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nom</th>
                        <th>Inscrit le :</th>
						<th>Modifier le :</th>
						<th>Voir</th>
                        @if(Auth::check() and Auth::user()->admin)
							<th>Modifier</th>
						    <th>Suprimer</th>
                        @endif
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{!! $user->id !!}</td>
							<td class="text-default"><strong>{!! $user->name !!}</strong></td>
                            <td class="text-default">{!! $user->created_at !!}</td>
							<td class="text-default">{!! $user->updated_at !!}</td>
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
		</div>

		<a href="http://127.0.0.1:8000/post" class="btn btn-info pull-left"> Voir les taches </a>

		@if(Auth::check() and Auth::user()->admin)
			{!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
		@endif
		<br>
		{!! $links !!}
	</div>
    </div>
</div>
@endsection