<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h3>Inscrivez-vous à notre newsletter</h3>
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
            </div>
        </div>
    </div>
</section>
