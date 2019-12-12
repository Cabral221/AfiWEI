<div class="card">
    <img src="htttp://picsum.photos/id/400/290/180" class="card-img-top">
    <div class="card-body">
        <div class="card-header"><h4>{{$room->libele}}</h4></div>
        <p>Nombre d'étudiant: {{ $room->students()->count() }}</p>
        @if ($room->complete())
            <p><span class="badge badge-pill badge-danger"><h4 class="mb-0">X</h4></span> Non Disponible</p>
        @else
            <p><span class="badge badge-pill badge-success"><h4 class="mb-0">v</h4></span> Disponible</p>
        @endif
        
        @if ($room->students()->count() > 0)
        <ul>
            @foreach ($room->students() as $student)
            <li>{{ $student->firstname }} {{ $student->lastname }}  {{ $student->niveau()->sigle }} {{ $student->sector()->sigle }} </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>