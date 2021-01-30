<?php

namespace App\Http\Controllers;

use App\Events\BienAjoute;
use App\Models\Log;
use App\Models\Picture;
use App\Models\Propertiescateg;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function latestproperties()
    {
        $properties = Property::with(['pictures' => function ($query) {
            $query->select('id', 'url');
        }])->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at'])->sortByDesc('created_at')->take(3);

        $propertiescategs = Propertiescateg::all();

        return view('client.accueil', ['properties' => $properties, 'propertiescategs' => $propertiescategs]);
    }

    public function allproperties()
    {
        $properties = Property::with(['pictures' => function ($query) {
            $query->select('id', 'url');
        }])->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at']);

        $propertiescategs = Propertiescateg::all();

        return view('client.BiensAVendre', ['properties' => $properties, 'propertiescategs' => $propertiescategs]);
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
        try {
            $this->validate($request, [
                    'price' => 'required',
                    'location' => 'required',
                    'm²' => 'required',
                    'pieces' => 'required',
                    'state' => 'required',
                    'year_construction' => 'required',
                    'description' => 'required',
                    'propertiescategs_id' => 'required',
                ]
            );
        } catch (ValidationException $e) {
        }

        $datas = $request->except('_token');
        Property::create($datas);

        Log::create(['name' => 'Bien ajouté']);
        event(BienAjoute::broadcast());

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
        try {
            $this->validate($request, [
                    'price' => 'required',
                    'location' => 'required',
                    'm²' => 'required',
                    'pieces' => 'required',
                    'state' => 'required',
                    'year_construction' => 'required',
                    'description' => 'required',
                    'propertiescategs_id' => 'required',
                ]
            );
        } catch (ValidationException $e) {
        }

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

        Log::create(['name' => 'Bien supprimé']);

        return view('admin.properties.index', ['properties' => property::all()]);
    }
}
