<?php

namespace App\Listeners;

use App\Events\BienAjoute;
use App\Models\Newsletter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

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
     * @param  BienAjoute  $event
     * @return void
     */
    public function handle(BienAjoute $event)
    {

        $UsersMails = Newsletter::all();

        $message = 'envoi mail a toute la liste';
        Log::debug($message);
    }
}
