<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index', ['tags' => tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                    'title' => 'required',
                ]
            );
        } catch (ValidationException $e) {
        }

        $datas = $request->except('_token');
        tag::create($datas);
        return view('admin.tags.index', ['tags' => tag::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
        $tags = tag::findOrFail($tag);
        return view('admin.tags.show', ['tag' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($tag)
    {
        $tags = tag::findOrFail($tag);
        return view('admin.tags.edit', ['tag' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        try {
            $this->validate($request, [
                    'title' => 'required',
                ]
            );
        } catch (ValidationException $e) {
        }

        $tags = tag::findOrFail($tag);
        $tags->update($request->except('_token'));
        return view('admin.tags.index', ['tags' => tag::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        tag::findOrFail($tag)->articles()->detach();
        tag::destroy($tag);
        return view('admin.tags.index', ['tags' => tag::all()]);
    }
}
