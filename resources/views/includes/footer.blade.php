<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h3 style="margin-bottom: 10px;">Inscrivez-vous à notre newsletter</h3>
                    <p class="text-white">Abonnez-vous à notre newsletter pour recevoir des notifications pour les
                        derniers biens mis en vente.</p>
                    {!! Form::open(['route'=>'newsletter.store'])!!}
                    <div class="input-group">
                        <input name="email" value="" type="email" class="form-control"
                               placeholder="ENTREZ VOTRE ADRESSE EMAIL">
                        <span class="input-group-btn">
                          <button class="btn" type="submit">ENVOYER</button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-12 mt-4" style="border-top: 1px solid darkgrey"></div>
            </div>
        </div>
    </div>
    <div class="row col-12">
        <div class="col-1" style="margin-top: 40px !important; padding-left: 0; padding-right: 0;"></div>
        <div class="col-11 text-white" style="margin-top: 40px !important; padding-left: 0; padding-right: 0;">
            <div class="row">
                <div class="mb-4 col-12 col-sm-6 col-lg-3 mb-lg-0">
                    <p>Biens à vendre</p>
                    <div class="col-8 line-footer"></div>

                    <form action="{{ route('biens_a_vendre.categ', ['categorie' => '3']) }}" method="POST" class="mb-2">
                        @csrf
                        <button class="footerProperty" type="submit">Enclos à dinosaures</button>
                    </form>

                    <form action="{{ route('biens_a_vendre.categ', ['categorie' => '2']) }}" method="POST" class="mb-2">
                        @csrf
                        <button class="footerProperty" type="submit">Maisons</button>
                    </form>

                    <form action="{{ route('biens_a_vendre.categ', ['categorie' => '1']) }}" method="POST" class="mb-2">
                        @csrf
                        <button class="footerProperty" type="submit">Appartements</button>
                    </form>

                </div>
                <div class="mb-4 col-12 col-sm-6 col-lg-3 mb-lg-0">
                    <p>Réseaux sociaux</p>
                    <div class="col-8 line-footer"></div>
                    <p>Twitter</p>
                    <p>Facebook</p>
                    <p>Pinterest</p>
                    <p>Linkedin</p>
                </div>
                <div class="mb-4 col-12 col-sm-6 col-lg-3 mb-lg-0">
                    <p>Nous contacter</p>
                    <div class="col-8 line-footer"></div>
                    <p>Tel : 0200000000</p>
                    <p><a href="{{ route('contact') }}" class="text-white"> Contactez-nous </a></p>
                </div>
                <div class="mb-4 col-12 col-sm-6 col-lg-3 mb-lg-0">
                    <p>Mentions Légales</p>
                    <div class="col-8 line-footer"></div>
                    <p><a href="{{ route('conditions_utilisations') }}" class="text-white"> Conditions d'utilisation </a></p>
                    <p><a href="{{ route('politique_confidentialite') }}" class="text-white"> Politique de confidentialité </a></p>
                    <p><a href="{{ route('cookies') }}" class="text-white"> Cookies </a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function displayMessageNewsletter() {
        document.getElementById('messageNewsletter').style.display = 'none';
    }


    $(document).ready(function () {
        if ($(document.body).height() < $(window).height()) {
            $('section.newsletter').attr('style', 'position: fixed!important; bottom: 0px; width: 100%;');
        }
    });


</script>
