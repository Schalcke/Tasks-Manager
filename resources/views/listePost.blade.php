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
				<h3 class="panel-title">Liste des taches</h3>
			</div>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th>ID</th>
						<th>Titre</th>
                        <th>Ajouter le:</th>
						<th>Expire le:</th>
						<th>Actions</th>
						@if(Auth::check() and Auth::user()->admin)
							<th>Modifier</th>
							<th scope="col">Suprimer</th>
                        @endif 
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<td>{!! $post->id !!}</td>
							<td class="text-default"><strong>{!! $post->titre !!}</strong></td>
                            <td class="text-default">{!! $post->created_at !!}</td>
							<td class="text-default">{!! $post->updated_at !!}</td>
							<td>{!! link_to_route('post.show', 'Voir', [$post->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							@if((Auth::check() and Auth::user()->admin) || Auth::user()->id == $post->user_id)
							<td>{!! link_to_route('post.edit', 'Modifier', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet tache ?\')']) !!}
                                {!! Form::close() !!}
                            </td>
                        	@endif
						</tr>
					@endforeach
	  			</tbody>
			</table>
		</div>
		<a href="http://127.0.0.1:8000/user" class="btn btn-info pull-left"> Voir les utilisateurs </a>
        @if(Auth::check())
            {!! link_to_route('post.create', 'Ajouter une tache', [], ['class' => 'btn btn-info pull-right']) !!}
        @endif
		<br>
		{!! $links !!}
	</div>
    </div>
</div>
@endsection