<div class="bg_navbar_burger d-none"
     style="height: 100vh; width: 100%; background: #00000090; position: fixed; z-index: 9999; top: 0;">
    <div class="navbar_burger" style="height: 100vh; background: #1C282E; position: relative; z-index: 10000;">

        <div class="row m-auto w-100 d-flex justify-content-start pb-4">
            <div class="col-4 col-sm-5">
                <img id="menu_croix_burger" src="{{asset('img/croix_white.png')}}" height="60" width="60">
            </div>
            <div class="col-7 d-flex justify-content-start align-items-center">
                <a class="navbar-brand">
                    <img class="m-auto pt-3" src="{{asset('img/logo_noirblanc_png.png')}}" height="50"
                         width="50">
                    <h5 class="text-white">DinoVert</h5>
                </a>
            </div>
        </div>

        <div id="scrollbar_burger" style="overflow-y: scroll; height: calc(100% - 15vh);">

            <div class="container Items_burger m-0 p-0">
                <div class="row d-flex justify-content-around m-0 p-0">
                    <div class="col-12 row d-flex justify-content-around m-0 p-0">

                        @foreach($lasted_properties as $property)

                            <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-around">
                                <a href="{{route('biens_a_vendre.details', ['property' => $property->id])}}"
                                   style="text-decoration: none; color: unset;">

                                    @if($property->pictures->isEmpty())
                                        <img style="width: 300px; height: 200px;"
                                             src="https://pyrenees.media.tourinsoft.eu/upload/Pasd-ImagesDisponible-ba91bb1444f84ed392cd463caa4d074f.jpg">
                                    @else
                                        <img style="width: 300px; height: 200px;"
                                             src="{{ $property->pictures->first()->url }}">
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

            <div class="col-9 m-auto" style="border-top: 1px solid darkgrey; margin-top: 20px !important;"></div>

            <div class="container text-white mt-4">
                <ul>
                    <li class="mt-3 ml-2"><a href="{{ route('biens_a_vendre') }}" class="text-white">Biens à vendre</a>
                    </li>
                    <li class="mt-3 ml-2"><a href="{{ route('actualites') }}" class="text-white">Actualités</a></li>
                    <li class="mt-3 ml-2"><a href="{{ route('qui_sommes_nous') }}" class="text-white">Qui sommes-nous
                            ?</a>
                    </li>
                    <li class="mt-3 ml-2"><a href="{{ route('contact') }}" class="text-white"> Contactez-nous </a></li>
                    @auth()
                        <li id="li_admin" style="margin-top: 15px; margin-left: 5px;">
                            <div class="relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button
                                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                <img class="h-8 w-8 rounded-full object-cover"
                                                     src="{{ Auth::user()->profile_photo_url }}"
                                                     alt="{{ Auth::user()->name }}"/>
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('dashboard') }}">
                                            {{ __('Dashboard') }}
                                        </x-jet-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                        @endif

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Logout') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>

            <div class="container-fluid" style="color: #455D6A; height: 20vh;">
                <div class="row d-flex justify-content-center align-items-center h-100 w-100 m-auto">
                    <div class="col-12 d-flex align-items-center justify-content-center svgAccueil_burger"
                         style="margin-top: -60px;">
                        <div class="sc-qPMSF ATyBL_burger">
                            <button type="button" title="Partager cette page sur Twitter"
                                    aria-label="Partager cette page sur Twitter"
                                    class="sc-AxirZ w-100 gnuFZe sc-qXJKU cHKXqv"><span
                                    class="sc-AxiKw w-100 cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15"
                                                                       xmlns="http://www.w3.org/2000/svg" fill="green"
                                                                       role="img"><path
                                            d="m15 2.85c-.55.24-1.14.41-1.77.49.64-.38 1.12-.98 1.35-1.7-.6.35-1.25.61-1.96.75-.56-.6-1.36-.97-2.24-.97-1.7 0-3.08 1.38-3.08 3.08 0 .24.03.48.08.7-2.55-.14-4.82-1.37-6.34-3.23-.26.45-.41.98-.41 1.55 0 1.07.54 2.01 1.37 2.56-.51-.02-.98-.16-1.4-.39v.04c0 1.49 1.06 2.74 2.47 3.02-.26.07-.53.1-.81.1-.2 0-.39-.02-.58-.05.39 1.22 1.53 2.11 2.87 2.14-1.05.82-2.38 1.31-3.82 1.31-.25 0-.49-.01-.73-.04 1.36.87 2.98 1.38 4.72 1.38 5.66 0 8.75-4.69 8.75-8.75l-.01-.4c.61-.43 1.13-.97 1.54-1.59zm0 0"></path></svg></span>
                            </button>
                        </div>
                        <div class="sc-qPMSF ATyBL_burger">
                            <button type="button" title="Partager cette page sur Facebook"
                                    aria-label="Partager cette page sur Facebook"
                                    class="sc-AxirZ w-100 gnuFZe sc-qXJKU cHKXqv"><span
                                    class="sc-AxiKw w-100 cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15"
                                                                       xmlns="http://www.w3.org/2000/svg" fill="green"
                                                                       role="img"><path
                                            d="m11.5 0v2.25h-2.93c-.31 0-.57.32-.57.63v1.62h3.25l-.61 2.25h-2.64v8.25h-2.25v-8.25h-2.25v-2.25h2.25v-1.75c0-1.59 1.17-2.75 2.75-2.75z"></path></svg></span>
                            </button>
                        </div>
                        <div class="sc-qPMSF ATyBL_burger">
                            <button type="button" title="Partager cette page sur Pinterest"
                                    aria-label="Partager cette page sur Pinterest"
                                    class="sc-AxirZ w-100 gnuFZe sc-qXJKU cHKXqv"><span
                                    class="sc-AxiKw w-100 cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15"
                                                                       xmlns="http://www.w3.org/2000/svg" fill="green"
                                                                       role="img"><path
                                            d="m13.5 5.34c0 3.18-2.04 5.75-4.87 5.75-.95 0-1.85-.49-2.15-1.06 0 0-.47 1.76-.59 2.2-.19.71-.65 1.57-1.02 2.18-.03.05-.06.11-.1.16-.02.03-.04.05-.05.08-.12.15-.25.29-.39.35 0 0-.16-.13-.25-.58 0-.03-.02-.07-.02-.1-.01-.09-.02-.19-.03-.3 0 0 0 0 0-.01-.06-.7-.08-1.58.07-2.24.17-.72 1.1-4.59 1.1-4.59s-.27-.56-.27-1.38c0-1.29.76-2.24 1.7-2.24.8 0 1.19.59 1.19 1.3 0 .79-.51 1.98-.78 3.08-.22.92.47 1.67 1.39 1.67 1.67 0 2.95-1.73 2.95-4.23 0-2.21-1.62-3.76-3.92-3.76-2.67 0-4.24 1.97-4.24 4.01 0 .79.31 1.65.7 2.11.07.09.08.17.06.26-.07.29-.23.92-.26 1.05-.04.17-.13.2-.31.12-1.18-.54-1.91-2.22-1.91-3.58 0-2.91 2.15-5.59 6.21-5.59 3.26 0 5.79 2.28 5.79 5.34z"></path></svg></span>
                            </button>
                        </div>
                        <div class="sc-qPMSF ATyBL_burger">
                            <button type="button" title="Partager cette page sur LinkedIn"
                                    aria-label="Partager cette page sur LinkedIn"
                                    class="sc-AxirZ w-100 gnuFZe sc-qXJKU cHKXqv"><span
                                    class="sc-AxiKw w-100 cbpYqP"><svg height="15" width="15" viewBox="0 0 15 15"
                                                                       xmlns="http://www.w3.org/2000/svg" fill="green"
                                                                       role="img"><path
                                            d="m15 8.91v5.74h-3.1v-5.36c0-1.34-.47-2.26-1.6-2.26-.86 0-1.39.62-1.62 1.22-.07.21-.11.51-.11.81v5.59h-3.1s.04-9.05 0-10h3.1v1.41c0 .01.01.01 0 .01v-.01c.48-.68 1.17-1.66 2.83-1.66 2.05 0 3.6 1.43 3.6 4.51zm-13.32-8.55c-1.02 0-1.68.72-1.68 1.66 0 .93.64 1.67 1.64 1.67h.02c1.03 0 1.68-.74 1.68-1.67-.03-.94-.65-1.66-1.66-1.66zm-1.44 14.28h2.86v-10h-2.86z"></path></svg></span>
                            </button>
                        </div>
                        <div class="sc-oUAZN cbpYqP_burger">
                            <button type="button"
                                    title="Ouvrir le panneau de partage pour partager cette page par e-mail"
                                    aria-label="Ouvrir le panneau de partage pour partager cette page par e-mail"
                                    class="sc-AxirZ w-100 gnuFZe sc-pcxSc iBMijp"><span class="sc-AxiKw w-100 cbpYqP"><svg
                                        height="11"
                                        width="11"
                                        viewBox="0 0 11 11"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="green"
                                        role="img"><path
                                            d="m0 1.1h11l-5.5 4.2zm5.5 6.2-5.5-4.2v6.7h11v-6.7z"></path></svg></span>
                            </button>
                        </div>
                        <div class="sc-qPMSF ATyBL_burger">
                            <button type="button" title="Voir plus de réseaux sociaux"
                                    aria-label="Voir plus de réseaux sociaux"
                                    class="sc-AxirZ w-100 gnuFZe sc-qXJKU cHKXqv"><span class="sc-AxiKw w-100 cbpYqP"><svg
                                        height="15"
                                        width="15"
                                        viewBox="0 0 15 15"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="green"
                                        role="img"><path
                                            d="m4 7.5c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zm3.5-2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm5.5 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"></path></svg></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
