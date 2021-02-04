@extends('welcome')
@section('content')

    <div class="container-fluid background_main d-flex align-items-center justify-content-center text-white"
         style="height: 100vh;">
        @if (Auth::check())
            <form method="post" id="First_wysiwyg" class="mb-5" action="{{route('wysiwyg.update',$wysiwygs[0]->id)}}">
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
            <img src="{{asset('img/fleche_bas_white.png')}}" style="height: 50px; width: 50px;">
            </svg>
        </span>
    </div>


    <div class="container Items">
        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 row d-flex justify-content-around">

                <div class="row col-12 mb-5">
                    <h5 class="mr-1" style="color: #455D6A;">Les dernières sorties - </h5>
                    <h5><a href="{{ route('biens_a_vendre') }}" style="color: #E7A83F;">Voir tout</a></h5>
                </div>


                @foreach($properties as $property)

                    <div class="col-12 col-sm-6 col-lg-3 d-flex justify-content-around" style="color: #455D6A;">
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
                            <p style="margin-bottom: 1em;">{{ $property->m² }} m²</p>

                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid background_main_contact" style="height: 80vh;">
        <div class="contactezNous" style="font-family: Helvetica Now Text; padding-top: 135px;">
            <h1 class="text-white">Qui sommes</h1>
            <h1 class="text-white">-nous ?</h1>

            <a href="{{ route('contact') }}">
                <button type="button" class="btn btn-outline-primary btn_SavPlus">En savoir plus</button>
            </a>

        </div>
    </div>

    <div class="container-fluid" style="background: white; color: #455D6A; height: 20vh;">
        <div class="row d-flex justify-content-center align-items-center h-100 w-100 m-auto">
            <h5 class="text-dark col-12 text-center" style="font-family: Helvetica Now Text;">PARTAGEZ CETTE PAGE</h5>
            <div class="col-12 d-flex align-items-center justify-content-center svgAccueil" style="margin-top: -60px;"><div class="sc-qPMSF ATyBL"><button type="button" title="Partager cette page sur Twitter" aria-label="Partager cette page sur Twitter" class="sc-AxirZ gnuFZe sc-qXJKU cHKXqv"><span class="sc-AxiKw cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="green" role="img"><path d="m15 2.85c-.55.24-1.14.41-1.77.49.64-.38 1.12-.98 1.35-1.7-.6.35-1.25.61-1.96.75-.56-.6-1.36-.97-2.24-.97-1.7 0-3.08 1.38-3.08 3.08 0 .24.03.48.08.7-2.55-.14-4.82-1.37-6.34-3.23-.26.45-.41.98-.41 1.55 0 1.07.54 2.01 1.37 2.56-.51-.02-.98-.16-1.4-.39v.04c0 1.49 1.06 2.74 2.47 3.02-.26.07-.53.1-.81.1-.2 0-.39-.02-.58-.05.39 1.22 1.53 2.11 2.87 2.14-1.05.82-2.38 1.31-3.82 1.31-.25 0-.49-.01-.73-.04 1.36.87 2.98 1.38 4.72 1.38 5.66 0 8.75-4.69 8.75-8.75l-.01-.4c.61-.43 1.13-.97 1.54-1.59zm0 0"></path></svg></span></button></div><div class="sc-qPMSF ATyBL"><button type="button" title="Partager cette page sur Facebook" aria-label="Partager cette page sur Facebook" class="sc-AxirZ gnuFZe sc-qXJKU cHKXqv"><span class="sc-AxiKw cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="green" role="img"><path d="m11.5 0v2.25h-2.93c-.31 0-.57.32-.57.63v1.62h3.25l-.61 2.25h-2.64v8.25h-2.25v-8.25h-2.25v-2.25h2.25v-1.75c0-1.59 1.17-2.75 2.75-2.75z"></path></svg></span></button></div><div class="sc-qPMSF ATyBL"><button type="button" title="Partager cette page sur Pinterest" aria-label="Partager cette page sur Pinterest" class="sc-AxirZ gnuFZe sc-qXJKU cHKXqv"><span class="sc-AxiKw cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="green" role="img"><path d="m13.5 5.34c0 3.18-2.04 5.75-4.87 5.75-.95 0-1.85-.49-2.15-1.06 0 0-.47 1.76-.59 2.2-.19.71-.65 1.57-1.02 2.18-.03.05-.06.11-.1.16-.02.03-.04.05-.05.08-.12.15-.25.29-.39.35 0 0-.16-.13-.25-.58 0-.03-.02-.07-.02-.1-.01-.09-.02-.19-.03-.3 0 0 0 0 0-.01-.06-.7-.08-1.58.07-2.24.17-.72 1.1-4.59 1.1-4.59s-.27-.56-.27-1.38c0-1.29.76-2.24 1.7-2.24.8 0 1.19.59 1.19 1.3 0 .79-.51 1.98-.78 3.08-.22.92.47 1.67 1.39 1.67 1.67 0 2.95-1.73 2.95-4.23 0-2.21-1.62-3.76-3.92-3.76-2.67 0-4.24 1.97-4.24 4.01 0 .79.31 1.65.7 2.11.07.09.08.17.06.26-.07.29-.23.92-.26 1.05-.04.17-.13.2-.31.12-1.18-.54-1.91-2.22-1.91-3.58 0-2.91 2.15-5.59 6.21-5.59 3.26 0 5.79 2.28 5.79 5.34z"></path></svg></span></button></div><div class="sc-qPMSF ATyBL"><button type="button" title="Partager cette page sur LinkedIn" aria-label="Partager cette page sur LinkedIn" class="sc-AxirZ gnuFZe sc-qXJKU cHKXqv"><span class="sc-AxiKw cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="green" role="img"><path d="m15 8.91v5.74h-3.1v-5.36c0-1.34-.47-2.26-1.6-2.26-.86 0-1.39.62-1.62 1.22-.07.21-.11.51-.11.81v5.59h-3.1s.04-9.05 0-10h3.1v1.41c0 .01.01.01 0 .01v-.01c.48-.68 1.17-1.66 2.83-1.66 2.05 0 3.6 1.43 3.6 4.51zm-13.32-8.55c-1.02 0-1.68.72-1.68 1.66 0 .93.64 1.67 1.64 1.67h.02c1.03 0 1.68-.74 1.68-1.67-.03-.94-.65-1.66-1.66-1.66zm-1.44 14.28h2.86v-10h-2.86z"></path></svg></span></button></div><div class="sc-oUAZN cmfQvt"><button type="button" title="Ouvrir le panneau de partage pour partager cette page par e-mail" aria-label="Ouvrir le panneau de partage pour partager cette page par e-mail" class="sc-AxirZ gnuFZe sc-pcxSc iBMijp"><span class="sc-AxiKw cbpYqP"><svg height="11" width="11" viewBox="0 0 11 11" xmlns="http://www.w3.org/2000/svg" fill="green" role="img"><path d="m0 1.1h11l-5.5 4.2zm5.5 6.2-5.5-4.2v6.7h11v-6.7z"></path></svg></span></button></div><div class="sc-qPMSF ATyBL"><button type="button" title="Voir plus de réseaux sociaux" aria-label="Voir plus de réseaux sociaux" class="sc-AxirZ gnuFZe sc-qXJKU cHKXqv"><span class="sc-AxiKw cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="green" role="img"><path d="m4 7.5c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zm3.5-2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm5.5 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></span></button></div></div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_white.png)');

            $('.textHeader').addClass('text-white');
            $('#logo').attr('src', '../img/logo_noirblanc_png.png');
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
                $('#logo').attr('src', '../img/logo_png.png');
                $('nav.navbar').removeClass('d-none');
                $('nav.navbar').removeClass('nav_accueil_transparent');
                $('nav.navbar').addClass('nav_accueil_white');
            }

            if (localStorage['scroll'] < scroll) {
                $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_black.png)');

                $('.textHeader').removeClass('text-white');
                $('#logo').attr('src', '../img/logo_png.png');
                $('nav.navbar').removeClass('nav_accueil_white');
                $('nav.navbar').addClass('d-none');
            }

            if (scroll == 0) {
                $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_white.png)');

                $('.textHeader').addClass('text-white');
                $('#logo').attr('src', '../img/logo_noirblanc_png.png');
                $('nav.navbar').removeClass('d-none');
                $('nav.navbar').removeClass('nav_accueil_white');
                $('nav.navbar').addClass('nav_accueil_transparent');
            }


            $('nav.navbar').hover(function () {

                var scroll = $(window).scrollTop();

                if (scroll == 0) {
                    $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_black.png)');

                    $('.textHeader').removeClass('text-white');
                    $('#logo').attr('src', '../img/logo_png.png');
                    $('nav.navbar').removeClass('d-none');
                    $(this).removeClass('nav_accueil_transparent');
                    $(this).addClass('nav_accueil_white');
                }
            }, function () {

                var scroll = $(window).scrollTop();

                if (scroll == 0) {
                    $('.navbar-toggler-icon').css('background-image', 'url(../img/burger_white.png)');

                    $('.textHeader').addClass('text-white');
                    $('#logo').attr('src', '../img/logo_noirblanc_png.png');
                    $('nav.navbar').removeClass('d-none');
                    $(this).removeClass('nav_accueil_white');
                    $(this).addClass('nav_accueil_transparent');
                }

            });

            localStorage['scroll'] = scroll;

        });
    </script>

@endsection

