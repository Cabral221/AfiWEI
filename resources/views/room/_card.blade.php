<div class="col-md-{{$card}}">
<div class="card">
    <div class="card-body">
        <div class="card-header"><h4>{{$room->libele}}</h4></div>
        <p class="mb-1">Nombre d'étudiant: <b>{{ $room->students()->count() }}</b> # 
        @if ($room->complete())
            <span class="badge badge-pill badge-danger">véroullée</span>
        @else
            <span class="badge badge-pill badge-success">Disponible</span>
        @endif
        </p>
        <p class="mt-1">Quantité maximale : <b>{{ $room->qntMax }}</b></p>
        <ul>
            @if ($room->students()->count() > 0)
            @foreach ($room->students as $student)
                <li>{{ $student->firstname }} - {{ $student->lastname }} - {{ $student->niveau->sigle }} - {{ $student->sector->sigle }} </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
</div>