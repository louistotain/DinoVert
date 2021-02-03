<?php

namespace App\Listeners;

use App\Events\BienAjoute;
use App\Models\Newsletter;
use App\Models\Property;
use App\Models\propertiescateg;
use App\Listeners\Form;
use Illuminate\Support\Facades\Mail;

class EnvoiMailListNewsletter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param BienAjoute $event
     * @return void
     */
    public function handle(BienAjoute $event)
    {

        $NewProperty = '<h2>Un nouveau bien est disponible !</h2>';

        $NewProperty .= '<img style="width: 300px; height: 200px;" src="'.Property::all()->last()->pictures->first()->url.'">';

        foreach (propertiescateg::all() as $propertiescateg) {
            if (Property::all()->last()->propertiescategs_id == $propertiescateg->id) {
                $NewProperty .= '<h4>'.$propertiescateg->name.'</h4>';
            }
        }

        $NewProperty .= '<p>'.Property::all()->last()->price.'€</p>'.'<p>'.Property::all()->last()->location.'</p>'.'<p>'.Property::all()->last()->m².'m²</p>';

        foreach (Newsletter::all() as $UserMail) {
            $email = $UserMail->email;

            $_token = $UserMail->token;

            $urlToken = '<a href="'.route('public_index').'/Newsletter/'.$_token.'">Se désinscrire de la Newsletter</a>';

            Mail::send([], [], function ($message) use ($email, $NewProperty, $urlToken) {
                $message->to($email)
                    ->subject('Un nouveau bien est disponible !')
                    ->setBody('

                               '.$NewProperty.'
                               <br>

                               '.$urlToken.'

                              ', 'text/html');
            });
        }
    }
}
