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
                            <h4 class="text-center">Information de la chambre</h4>
                            @include('room._card',[$room,$card])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
