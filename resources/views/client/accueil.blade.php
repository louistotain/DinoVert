@extends('welcome')
@section('content')

    <div class="container-fluid">
        @if (Auth::check())
            <form method="post" class="mt-5 mb-5">
                @csrf
                <div id="title_dinovert">
                    @endauth
                    <div class="row text-center p-4">
                        <div>
                            <h5>Maison,</h5>
                            <h5>Appartement,</h5>
                            <h5>Enclos à dinosaure</h5>
                        </div>
                        <div>
                            <p>Trouvez tout ce dont vous avez besoin avec juste un swipe</p>
                        </div>
                    </div>
                    @if (Auth::check())
                </div>
            </form>
        @endauth
    </div>


    <div class="container-fluid" style="background: #70818a2b;">
        @if (Auth::check())
            <form method="post" class="mt-5 mb-5">
                @csrf
                <div id="under_title_dinovert">
                    @endauth
                    <div class="row text-left p-3 d-flex justify-content-around">
                        <div class="col-6">
                            <h5>Notre agence immobilière vous met le meilleurs à disposition toute l'année.</h5>
                        </div>
                    </div>
                    <div class="row text-left p-3 d-flex justify-content-around">
                        <div class="col-6">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore
                                et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                dolores et ea
                                rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                                amet.
                                Lorem
                                ipsum</p>
                        </div>
                    </div>
                    @if (Auth::check())
                </div>
            </form>
        @endauth
    </div>


    <div class="container">
        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 row d-flex justify-content-around">
                <h5>Les dernières sorties -</h5>

                @foreach($properties as $property)

                    <div class="col-3">

                        @foreach($property->pictures as $picture)
                            <img style="width: 300px; height: 200px;" src="{{ $picture->url ?? "https://pyrenees.media.tourinsoft.eu/upload/Pasd-ImagesDisponible-ba91bb1444f84ed392cd463caa4d074f.jpg"}}">
                            @break
                        @endforeach

                        @foreach($propertiescategs as $propertiescateg)
                            @if($property->propertiescategs_id == $propertiescateg->id)
                                <h5>{{ $propertiescateg->name }}</h5>
                            @endif
                        @endforeach

                        <p>{{ $property->price }}€</p>
                        <p>{{ $property->location }}</p>
                        <p>{{ $property->m² }} m²</p>

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection

