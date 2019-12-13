@extends('layouts.app')


@section('container')
<div class="container">
    <h2>Gestion des étudiants</h2>
    <a href="{{ route('home') }}" class="btn btn-dark mb-3">Retour</a>
    <div class="row">
        <div class="col-md-3">
            <form action="{{ route('etudiant.store') }}" method="post" class="form mt-3">
                <h5>Ajouter un étudiant</h5>
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                    <input type="text" name="lastname" id="" class="form-control" placeholder="Nom">
                    {!! $errors->first('lastname','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                    <input type="text" name="firstname" id="" class="form-control" placeholder="Prénom">
                    {!! $errors->first('firstname','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('niveau') ? 'has-error' : '' }}">
                    <select name="niveau" id="" class="form-control">
                        <option default value="">Selectionner le niveau</option>
                        @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}">{{ $niveau->libele }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('niveau','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('room') ? 'has-error' : '' }}">
                    <select name="room" id="" class="form-control">
                        <option default value="">Selectionner une Chambre</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->libele }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('room','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Ajouter l'Etudiant</button>
                </div>
            </form>
        </div>
        <div class="col-md-9 bg-info">
            <h4 class="mt-2">Liste des Etudiants</h4>
            <div>
                <table class="table">
                    <thead>
                        <th>#ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Niveau</th>
                        <th>Chambre</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td># {{ $student->id }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ $student->niveau->libele }}</td>
                                <td>{{ $student->room->libele ?? 'NEANT' }}</td>
                                <td>
                                    <a href="{{ route('etudiant.edit',$student->id) }}" class="btn btn-warning">Modifier</a>
                                <a href="#" class="btn btn-danger" onclick="if(confirm('Etes-vous sûr ?'))
                                { 
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{ $student->id }}').submit(); 
                                }else{
                                  event.preventDefault();
                                }">Supprimer</a>
                                    <form action="{{ route('etudiant.destroy',$student->id) }}" method="post" id="delete-form-{{ $student->id }}" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>        
@endsection