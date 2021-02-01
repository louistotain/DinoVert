@extends('welcome')
@section('content')

    <div class="row p-4 d-flex justify-content-around w-100">
        <div class="col-12 row">

            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 700px; height: 400px;">
                <ol class="carousel-indicators">

                    @php $i=0; @endphp

                    @foreach($property->pictures as $picture)

                        <li data-target="#myCarousel" data-slide-to="@php $i; @endphp"
                            @if($loop->first) class="active" @endif></li>

                        @php $i++; @endphp

                    @endforeach

                </ol>

                <div class="carousel-inner">

                    @foreach($property->pictures as $picture)
                        @if($loop->first)
                            <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                        @endif

                                        <img class="d-block w-100" src="{{ $picture->url }}" style="width: 700px; height: 400px;">
                                    </div>
                                    @endforeach

                            </div>

                            <a class="carousel-control-prev" href="#myCarousel" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                </div>

                <div class="col-12">

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
    </div>

@endsection

