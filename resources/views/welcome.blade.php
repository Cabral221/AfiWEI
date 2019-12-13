@extends('layouts.app')

@section('title')
AFI l'Université de l'Entreprise / Weekend integration
@endsection

@section('name-app')
    AFI l'Université de l'Entreprise
@endsection

@section('container')
<div class="jumbotron mt-0">
    <div class="jumbotron-fluid justify-content-center"><h1 class="text-danger text-center">AFI l'UE Weekend Integration</h1></div>
</div>
<div class="container">
    <h4 class="text-center">Organisation des chambres par groupes</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($rooms as $k => $room)
                    @include('room/_card',[$room,$card])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection