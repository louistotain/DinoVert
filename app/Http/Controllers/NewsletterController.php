<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $datas = $request->except('_token');
        Newsletter::create($datas);
        return redirect('/');
    }

    public function destroy($id)
    {
        dd($id);
        //Newsletter::destroy($id);
        //return redirect('/');
    }
}
