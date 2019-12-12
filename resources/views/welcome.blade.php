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
    <div class="row">
        <h1 class="text-center">Voici l'organisation des chambres par groupes</h1>
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <div class="grid">
                @foreach ($rooms as $room)
                    @include('room/_card',$room)
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection