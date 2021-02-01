<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $subject = $request->subject;
        $description = $request->message;

        Mail::send([], [], function ($message) use ($email,$name,$subject,$description) {
            $message->to('info.dinovert@gmail.com')
                ->subject($subject)
                ->setBody('
                               <h3>'.$email.'</h3>
                               <h5>'.$name.'</h5>
                               <p>'.$description.'</p>

                              ', 'text/html');
        });

        return view('client.contact', ['message' => 'message envoyé']);
    }
}
