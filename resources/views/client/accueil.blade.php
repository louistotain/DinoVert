@extends('welcome')
@section('content')

    <div class="container-fluid background_main d-flex align-items-center justify-content-center text-white"
         style="height: 100vh;">
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


    <div class="container-fluid" style="background: #70818a2b; color: #455D6A">
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

    <div height="812" class="sc-oULiq gnBraM">
        <span class="sc-AxiKw cbpYqP">
            <svg height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" role="img">
                <path d="m15 5.41-7.5 7.91-7.5-7.91 1.95-1.95 5.55 5.83 5.55-5.83z">
                </path>
            </svg>
        </span>
    </div>


    <div class="container">
        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 row d-flex justify-content-around">

                <div class="row col-12 mb-5">
                    <h5 class="mr-1">Les dernières sorties - </h5>
                    <h5><a href="{{ route('biens_a_vendre') }}" style="color: #E7A83F;">Voir tout</a></h5>
                </div>


                @foreach($properties as $property)

                    <div class="col-12 col-sm-6 col-lg-3 d-flex justify-content-around">
                        <a href="{{route('biens_a_vendre.details', ['property' => $property->id])}}"
                           style="text-decoration: none; color: unset;">

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
                            <p>{{ $property->m² }} m²</p>

                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_white.png)');

            $('.textHeader').addClass('text-white');
            $('#logo').attr('src', '../img/logo_noirblanc_png.png' );
            $('nav.navbar').addClass('nav_accueil_transparent');
        });

        $(window).scroll(function () {

            if (localStorage['scroll'] == null) {
                localStorage['scroll'] = 0;
            }

            var scroll = $(window).scrollTop();

            if (localStorage['scroll'] > scroll) {
                $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_black.png)');

                $('.textHeader').removeClass('text-white');
                $('#logo').attr('src', '../img/logo_png.png' );
                $('nav.navbar').removeClass('d-none');
                $('nav.navbar').removeClass('nav_accueil_transparent');
                $('nav.navbar').addClass('nav_accueil_white');
            }

            if (localStorage['scroll'] < scroll) {
                $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_black.png)');

                $('.textHeader').removeClass('text-white');
                $('#logo').attr('src', '../img/logo_png.png' );
                $('nav.navbar').removeClass('nav_accueil_white');
                $('nav.navbar').addClass('d-none');
            }

            if (scroll == 0) {
                $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_white.png)');

                $('.textHeader').addClass('text-white');
                $('#logo').attr('src', '../img/logo_noirblanc_png.png' );
                $('nav.navbar').removeClass('d-none');
                $('nav.navbar').removeClass('nav_accueil_white');
                $('nav.navbar').addClass('nav_accueil_transparent');
            }


            $('nav.navbar').hover(function () {

                var scroll = $(window).scrollTop();

                if (scroll == 0) {
                    $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_black.png)');

                    $('.textHeader').removeClass('text-white');
                    $('#logo').attr('src', '../img/logo_png.png' );
                    $('nav.navbar').removeClass('d-none');
                    $(this).removeClass('nav_accueil_transparent');
                    $(this).addClass('nav_accueil_white');
                }
            }, function () {

                var scroll = $(window).scrollTop();

                if (scroll == 0) {
                    $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_white.png)');

                    $('.textHeader').addClass('text-white');
                    $('#logo').attr('src', '../img/logo_noirblanc_png.png' );
                    $('nav.navbar').removeClass('d-none');
                    $(this).removeClass('nav_accueil_white');
                    $(this).addClass('nav_accueil_transparent');
                }

            });

            localStorage['scroll'] = scroll;

        });
    </script>

@endsection

