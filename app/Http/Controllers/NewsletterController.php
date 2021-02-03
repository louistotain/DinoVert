<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function store(Request $request)
    {
        $previousUrl = app('url')->previous();

        $datas = $request->except('_token');
        $token = ['token' => bin2hex(random_bytes(78))];

        $datas = array_merge($datas, $token);

        $newsletter = Newsletter::where('email','=',$request->email)->get();

        if ($newsletter->isEmpty()){
            Newsletter::create($datas);
            return redirect($previousUrl)->withInput(['Newsletter' => 'true']);
        }else{
            return redirect($previousUrl)->withInput(['Newsletter' => 'false']);
        }

    }

    public function destroy($token)
    {
        foreach (Newsletter::all() as $email){
            if ($email->token == $token){
                $id = $email->id;
            }
        }

        Newsletter::destroy($id);

        return redirect('/')->withInput(['NewsletterDesc' => 'true']);
    }
}
