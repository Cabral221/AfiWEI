@extends('layouts.app')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @include('partials.navbarAdmin')
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-2 bg-info">
                            <form action="{{ route('room.update',$room) }}" method="post" class="form mt-3">
                                <h6>Modifier les données de la chambre</h6>
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group {{ $errors->has('libele') ? 'has-error' : '' }}">
                                    <input type="text" name="libele" value="{{ $room->libele ?? old() }}" id="libele" class="form-control" placeholder="Libele de la chambre">
                                    {!! $errors->first('libele','<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('qntMax') ? 'has-error' : '' }}">
                                    <input type="number" name="qntMax" value="{{ $room->qntMax ?? old() }}"  id="qntMax" class="form-control" placeholder="Quantité maximale de la chambre">
                                    {!! $errors->first('qntMax','<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
