<?php

namespace App\Listeners;

use App\Events\BienAjoute;
use App\Models\Newsletter;
use App\Models\Property;
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

        foreach (Newsletter::all() as $UserMail) {
            $email = $UserMail->email;
            $id = $UserMail->id;
            Mail::send([], [], function ($message) use ($email, $id) {
                $message->to($email)
                    ->subject('Un nouveau bien est disponible !')
                    ->setBody('

                               <h1>"Fiche nouveau bien"</h1>
                               <br>

                               <form method="POST" action="'.route('newsletter.destroy',['id' => $id]).'" accept-charset="UTF-8">
                               <input name="_method" type="hidden" value="DELETE">
                               <input name="_token" type="hidden" value="K6i8krc1wtXqoXlLPNnEPfbExKfooEO1X8ivq7LR">
                               <input type="submit" value="Se désinscrire de la Newsletter">
                               </form>

                              ', 'text/html');
            });
        }
    }
}
