@extends('layouts.app')

@section('title')
    AFI L'UE / Gestion des niveaux
@endsection

@section('container')
<div class="container">
    <h2 class="text-center mt-3">Gestion des niveaux d' étude</h2>
    <a href="{{ route('home') }}" class="btn btn-dark mb-3">Retour</a>
    <div class="row">
        <div class="col-md-3">
            <form action="{{ route('niveau.store') }}" method="post">
                {{ csrf_field() }}
                <h2>Ajouter un niveau</h2>
                <div class="form-group {{ $errors->has('libele') ? 'has-error' : '' }}">
                    <input type="text" name="libele" id="" class="form-control" placeholder="Libelé">
                    {!! $errors->first('libele','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('sigle') ? 'has-error' : '' }}">
                    <input type="text" name="sigle" id="" class="form-control" placeholder="Sigle">
                    {!! $errors->first('sigle','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Créer</button>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Liste des Niveaux d'étude</h2>
                    </div>
                    <table class="table">
                        <thead>
                            <th>Libelé</th>
                            <th>Sigle</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($niveaux as $niveau)
                            <tr>
                                <td>{{ $niveau->libele }}</td>
                                <td>{{ $niveau->sigle }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning">Modifier</a>
                                    <a href="#" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection