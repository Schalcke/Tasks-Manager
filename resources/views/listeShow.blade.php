@extends('layouts.app')

@section('content')
    <div class="col-md-offset-3 col-md-6">
        <br>
        <div class="panel panel-primary">   
            <div class="panel-heading">Fiche de tache</div>
            <div class="panel-body"> 
                <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td> | </td>
                            <th>
                                <p class="pull-right">{{ $post->id }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>Titre</th>
                            <td> | </td>
                            <th>
                                <p class="pull-right">{{ $post->titre }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>Contenu</th>
                            <td> | </td>
                            <th>
                                <p class="pull-right">{{ $post->contenu }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>ID de l'auteur</th>
                            <td> | </td>
                            <th>
                                <p class="pull-right">{{ $post->user_id }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>Ajouter le </th>
                            <td> | </td>
                            <th>
                                <p class="pull-right">{{ $post->created_at }}</p>
                            </th>
                        </tr>
                        <tr>
                            <th>Expire le </th>
                            <td> | </td>
                            <th>
                                <p class="pull-right">{{ $post->updated_at }}</p>
                            </th>
                        </tr>
                        </tbody>
                </table>

                @if(Auth::check() and Auth::user()->id == $post->user_id)
                    <td>{!! link_to_route('post.edit', 'Modifier', [$post->id], ['class' => 'btn btn-warning pull-left']) !!}</td>
                @endif
            </div>
        </div>              

        <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection