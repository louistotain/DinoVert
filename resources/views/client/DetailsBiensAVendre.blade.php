@extends('welcome')
@section('content')

    <div class="row p-4 d-flex justify-content-around">
        <div class="col-12 row">

            @if($property->pictures->isEmpty())
                <img style="width: 300px; height: 200px;"
                     src="https://pyrenees.media.tourinsoft.eu/upload/Pasd-ImagesDisponible-ba91bb1444f84ed392cd463caa4d074f.jpg">
            @else
                <img style="width: 300px; height: 200px;" src="{{ $property->pictures->first()->url }}">
            @endif

            @foreach($propertiescategs as $propertiescateg)
                @if($property->propertiescategs_id == $propertiescateg->id)
                    <h5>{{ $propertiescateg->name }}</h5>
                @endif
            @endforeach

            <p>{{ $property->price }}€</p>
            <p>{{ $property->location }}</p>
            <p>{{ $property->pieces }}</p>
            <p>{{ $property->state }}</p>
            <p>{{ $property->year_construction }}</p>
            <p>{{ $property->description }}</p>

        </div>
    </div>
    </div>

@endsection

