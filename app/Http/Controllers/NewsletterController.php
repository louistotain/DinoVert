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

        $newsletter = Newsletter::where('email','=',$request->email)->get();

        if ($newsletter->isEmpty()){
            Newsletter::create($datas);
            return redirect($previousUrl)->withInput(['Newsletter' => 'true']);
        }else{
            return redirect($previousUrl)->withInput(['Newsletter' => 'false']);
        }

    }

    public function destroy($id)
    {
        dd($id);
        //Newsletter::destroy($id);
        //return redirect('/');
    }
}
