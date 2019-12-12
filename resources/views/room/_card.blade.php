<div class="card">
    <img src="htttp://picsum.photos/id/400/290/180" class="card-img-top">
    <div class="card-body">
        <div class="card-header"><h4>{{$room->libele}}</h4></div>
        <p>Nombre d'étudiant: {{ $room->students()->count() }}</p>
        @if ($room->students()->count() > 0)
        <ul>
            @foreach ($room->students() as $$student)
            <li>{{ $student->Nom }} {{ $student->Nom }} (Filiaire) niveau</li>
            @endforeach
            </ul>
        @endif
    </div>
</div>