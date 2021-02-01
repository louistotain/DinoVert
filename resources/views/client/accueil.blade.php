@extends('welcome')
@section('content')

    <div class="container-fluid">
        @if (Auth::check())
            <form method="post" class="mt-5 mb-5" action="{{route('wysiwyg.update',$wysiwygs[0]->id)}}">
                @csrf
                @method('PUT')
                <div class="wysiwyg">
                    @endauth
                        {!! $wysiwygs[0]->content !!}
                    @if (Auth::check())
                </div>
            </form>
        @endauth
    </div>


    <div class="container-fluid" style="background: #70818a2b;">
        @if (Auth::check())
            <form method="post" class="mt-5 mb-5" action="{{route('wysiwyg.update',$wysiwygs[1]->id)}}">
                @csrf
                @method('PUT')
                <div class="wysiwyg">
                    @endauth
                        {!! $wysiwygs[1]->content !!}
                    @if (Auth::check())
                </div>
            </form>
        @endauth
    </div>


    <div class="container">
        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 row d-flex justify-content-around">

                <div class="row col-12 mb-5">
                    <h5 class="mr-1">Les dernières sorties - </h5>
                    <h5><a href="{{ route('biens_a_vendre') }}" style="color: #E7A83F;">Voir tout</a></h5>
                </div>


                @foreach($properties as $property)

                    <div class="col-3">

                        @if($property->pictures->isEmpty())
                            <img style="width: 300px; height: 200px;" src="https://pyrenees.media.tourinsoft.eu/upload/Pasd-ImagesDisponible-ba91bb1444f84ed392cd463caa4d074f.jpg">
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
                        <p>{{ $property->m² }} m²</p>

                    </div>

                @endforeach
            </div>
        </div>
    </div>

@endsection

