<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pictures.index', ['pictures' => picture::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = Property::pluck('description', 'id');
        return view('admin.pictures.create', ['properties' => $properties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->except('_token');
        picture::create($datas);
        return view('admin.pictures.index', ['pictures' => picture::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\picture $picture
     * @return \Illuminate\Http\Response
     */
    public function show($picture)
    {
        $pictures = picture::findOrFail($picture);
        return view('admin.pictures.show', ['picture' => $pictures]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\picture $picture
     * @return \Illuminate\Http\Response
     */
    public function edit($picture)
    {
        $pictures = picture::findOrFail($picture);
        return view('admin.pictures.edit', ['picture' => $pictures]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\picture $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $picture)
    {
        $pictures = picture::findOrFail($picture);
        $pictures->update($request->except('_token'));
        return view('admin.pictures.index', ['pictures' => picture::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\picture $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy($picture)
    {
        picture::destroy($picture);
        return view('admin.pictures.index', ['pictures' => picture::all()]);
    }
}
