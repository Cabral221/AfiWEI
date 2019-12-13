@extends('layouts.app')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @include('partials.navbarAdmin')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('room.store') }}" method="post" class="form mt-3">
                                <h6>Ajouter une chambre</h6>
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('libele') ? 'has-error' : '' }}">
                                    <input type="text" name="libele" id="libele" class="form-control" placeholder="Libele de la chambre">
                                    {!! $errors->first('libele','<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('qntMax') ? 'has-error' : '' }}">
                                    <input type="number" name="qntMax" id="qntMax" class="form-control" placeholder="Quantité maximale de la chambre">
                                    {!! $errors->first('qntMax','<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9 bg-info">
                            <h4 class="mt-2">Disponibilité des chambres</h4>
                            <div>
                                <table class="table">
                                    <thead>
                                        <th>#ID</th>
                                        <th>Libelé</th>
                                        <th class="text-center">Qnt actuelle</th>
                                        <th class="text-center">Qnt maximale</th>
                                        <th class="text-center">Disponibilité</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                        @foreach ($rooms as $room)
                                        <tr>
                                            <td># {{ ++$i }}</td>
                                            <td ><a href="{{ route('room.show',$room->id) }}" class="text-light alert-link">{{ $room->libele }}</a></td>
                                            <td class="text-center">{{ $room->students()->count() }}</td>
                                            <td class="text-center">{{ $room->qntMax }}</td>
                                            <td class="text-center">
                                                {{-- {{dd($room->complete())}} --}}
                                                @if ($room->complete())
                                                <span class="badge badge-pill badge-danger"><h5 class="mb-0">X</h5></span>
                                                @else
                                                <span class="badge badge-pill badge-success"><h5 class="mb-0">v</h5></span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('room.edit',$room) }}" class="btn btn-warning">Modifier</a>
                                                <a href="{{ route('room.destroy',$room) }}" class="btn btn-danger" onclick="if(confirm('Etes-vous sûr ?'))
                                                { 
                                                  event.preventDefault();
                                                  document.getElementById('form-delete-{{ $room->id }}').submit(); 
                                                }else{
                                                  event.preventDefault();
                                                }">Supprimer</a>
                                                <form action="{{ route('room.destroy',$room) }}" method="post" id="form-delete-{{$room->id}}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
