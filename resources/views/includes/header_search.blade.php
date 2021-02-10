<div class="bg_navbar_search d-none"
     style="height: 100vh; width: 100%; background: #00000090; position: fixed; z-index: 9999; top: 0;">
    <div class="navbar_search" style="background: white; position: relative; z-index: 10000;">

        <div class="row m-auto w-100 d-flex justify-content-center pb-4">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <a class="navbar-brand m-auto">
                    <img class="m-auto pt-2" src="{{asset('img/logo_png.png')}}" height="50" width="50">
                    <h5 class="text-black">DinoVert</h5>
                </a>
                <div class="position-absolute" style="right: 12vw; top: 0;">
                    <img id="menu_croix_search" src="{{asset('img/croix_black.png')}}" height="60" width="60">
                </div>
            </div>
        </div>

        <h3 class="text-center pt-4" style="font-family: Helvetica Now Text;">Recherchez un bien</h3>

        <div class="s003">
            <form action="{{ route('biens_a_vendre.categ') }}" method="POST">
                @csrf
                <div class="inner-form">
                    <div class="input-field second-wrap">
                        <input name="search" id="search" type="text" placeholder="Recherche"/>
                    </div>
                    <div class="input-field third-wrap">
                        <button class="btn-search d-flex justify-content-around align-items-center" type="submit">
                            <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                                 data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
