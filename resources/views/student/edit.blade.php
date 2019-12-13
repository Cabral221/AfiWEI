@extends('layouts.app')

@section('container')
<div class="container">
    @include('partials.navbarAdmin')
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3 bg-info">
            <form action="{{ route('etudiant.update',$student) }}" method="post" class="form mt-3">
                <h5>Modier les données de l'étudiant</h5>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                    <input type="text" name="lastname" value="{{ $student->lastname ?? old() }}" id="" class="form-control" placeholder="Nom">
                    {!! $errors->first('lastname','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                    <input type="text" name="firstname" value="{{ $student->firstname ?? old() }}" id="" class="form-control" placeholder="Prénom">
                    {!! $errors->first('firstname','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <input type="number" name="phone" value="{{ $student->phone ?? old() }}" id="" class="form-control" placeholder="Téléphone">
                    {!! $errors->first('phone','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('filiere') ? 'has-error' : '' }}">
                    <select name="filiere" id="" class="form-control">
                        <option value="">Selectionner une filiére</option>
                        @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ ($student->sector->id == $sector->id) ? 'selected="selected"' : '' }}>{{ $sector->libele }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('filiere','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('niveau') ? 'has-error' : '' }}">
                    <select name="niveau" id="" class="form-control">
                        <option value="">Selectionner le niveau</option>
                        @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}" {{ ($student->niveau->id == $niveau->id) ? 'selected="selected"' : '' }}>{{ $niveau->libele }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('niveau','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('room') ? 'has-error' : '' }}">
                    <select name="room" id="" class="form-control">
                        <option value="">Selectionner une Chambre</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ ($student->room->id == $room->id) ? 'selected="selected"' : '' }}>{{ $room->libele }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('room','<p class="help-block text-danger">:message</p>') !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Modifier l'Etudiant</button>
                </div>
            </form>
        </div>
    </div>  
</div>
@endsection