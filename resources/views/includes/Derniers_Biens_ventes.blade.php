@foreach($properties as $property)

    <div class="col-3">

        <?php $i = 0; ?>

        @foreach($pictures as $picture)

            @if($picture->properties_id == $property->id)
                <img style="width: 300px; height: 200px;" src="{{ $picture->url }}">
                @break
            @else
                <?php $i++; ?>
            @endif()

            @if($i == $pictures->count())
                <img style="width: 300px; height: 200px;" src="https://pyrenees.media.tourinsoft.eu/upload/Pasd-ImagesDisponible-ba91bb1444f84ed392cd463caa4d074f.jpg">
            @endif()

        @endforeach

        @foreach($propertiescategs as $propertiescateg)
            @if($propertiescateg->id == $property->id)
                <h5>{{ $propertiescateg->name }}</h5>
            @endif
        @endforeach

        <p>{{ $property->price }}€</p>
        <p>{{ $property->location }}</p>
        <p>{{ $property->m² }} m²</p>

    </div>

@endforeach








