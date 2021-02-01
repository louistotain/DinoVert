<?php

namespace App\Http\Controllers;

use App\Models\Wysiwyg;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WysiwygController extends Controller
{
    public function update(Request $request, $wysiwyg)
    {
        $wysiwygs = Wysiwyg::findOrFail($wysiwyg);

        $content = $request->except('_token','_method');
        $content = Arr::first($content);

        $wysiwygs->content = $content;

        $wysiwygs->save();

        return back();
    }
}
