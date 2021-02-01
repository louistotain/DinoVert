<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('public_index') }}"><img src="{{asset('img/logo_png.png')}}" height="50"
                                                                        width="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('biens_a_vendre') }}">Biens à vendre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('actualites') }}">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('qui_sommmes_nous') }}">Qui sommes-nous ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            @auth()
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Admin</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>

@if(old('Newsletter') == 'true')
    @php $messageNewsletter = 'Vous êtes maintenant inscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: #E7A83F;">
        <div class="col-6 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-6 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>

@elseif(old('Newsletter') == 'false')
    @php $messageNewsletter = 'cet email est déjà inscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: darkred;">
        <div class="col-6 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-6 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>

@else

@endif



