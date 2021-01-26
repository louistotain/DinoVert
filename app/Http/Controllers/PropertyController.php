<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Propertiescateg;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.properties.index', ['properties' => Property::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertiescategs = propertiescateg::pluck('name', 'id');
        return view('admin.properties.create', ['propertiescategs' => $propertiescategs]);
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
        Property::create($datas);
        return view('admin.properties.index', ['properties' => Property::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function show($property)
    {
        $properties = Property::findOrFail($property);
        return view('admin.properties.show', ['property' => $properties]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function edit($property)
    {
        $properties = property::findOrFail($property);
        return view('admin.properties.edit', ['property' => $properties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $property)
    {
        $properties = property::findOrFail($property);
        $properties->update($request->except('_token'));
        return view('admin.properties.index', ['properties' => property::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($property)
    {

        foreach (picture::all() as $picture) {
            if ($picture['properties_id'] == $property) {
                $picture->where('properties_id', $property)->first()->delete();
            }
        }

        property::destroy($property);

        return view('admin.properties.index', ['properties' => property::all()]);
    }
}
