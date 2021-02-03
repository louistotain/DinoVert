<?php

namespace App\Http\Controllers;

use App\Events\BienAjoute;
use App\Models\Log;
use App\Models\Picture;
use App\Models\Propertiescateg;
use App\Models\Property;
use App\Models\Wysiwyg;
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
        return view('admin.properties.index', ['properties' => Property::all(), 'propertiescategs' => Propertiescateg::all()]);
    }

    public function latestproperties()
    {
        $wysiwygs = Wysiwyg::all();

        $properties = Property::with(['pictures' => function ($query) {
            $query->select('id', 'url');
        }])->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at'])->sortByDesc('created_at')->take(3);

        $propertiescategs = Propertiescateg::all();

        return view('client.accueil', ['properties' => $properties, 'propertiescategs' => $propertiescategs, 'wysiwygs' => $wysiwygs]);
    }

    public function allproperties()
    {
        $properties = Property::with(['pictures' => function ($query) {
            $query->select('id', 'url');
        }])->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at']);

        $propertiescategs = Propertiescateg::all();

        return view('client.BiensAVendre', ['properties' => $properties, 'propertiescategs' => $propertiescategs]);
    }

    public function categproperties(Request $request)
    {

        if ($request->categorie == 0 && $request->search == null) {

            $properties = Property::with(['pictures' => function ($query) {
                $query->select('id', 'url');
            }])->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at']);

            $propertiescategs = Propertiescateg::all();

            return view('client.BiensAVendre', ['properties' => $properties, 'propertiescategs' => $propertiescategs]);

        } elseif ($request->categorie == 0) {

            $properties = Property::with(['pictures' => function ($query) {
                $query->select('id', 'url');
            }])->where('price', 'LIKE', "%{$request->search}%")
                ->orwhere('location', 'LIKE', "%{$request->search}%")
                ->orwhere('m²', 'LIKE', "%{$request->search}%")
                ->orwhere('pieces', 'LIKE', "%{$request->search}%")
                ->orwhere('state', 'LIKE', "%{$request->search}%")
                ->orwhere('year_construction', 'LIKE', "%{$request->search}%")
                ->orwhere('description', 'LIKE', "%{$request->search}%")
                ->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at']);

            $propertiescategs = Propertiescateg::all();

            return view('client.BiensAVendre', ['properties' => $properties, 'propertiescategs' => $propertiescategs, 'search' => $request->search]);

        } elseif ($request->categorie != 0 && $request->search == null) {

            $propertycateg = Propertiescateg::findOrFail($request->categorie);

            $propertiescategs = Propertiescateg::all();
            $properties = Property::with(['pictures' => function ($query) {
                $query->select('id', 'url');
            }])->where('propertiescategs_id', '=', $propertycateg->id)
                ->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at']);

            return view('client.BiensAVendre', ['properties' => $properties, 'propertiescategs' => $propertiescategs, 'mainCategName' => $propertycateg->name, 'mainCategId' => $propertycateg->id]);

        } else {

            $propertycateg = Propertiescateg::findOrFail($request->categorie);
            $propertiescategs = Propertiescateg::all();

            $properties = Property::with(['pictures' => function ($query) {
                $query->select('id', 'url');
            }])->where('price', 'LIKE', "%{$request->search}%")
                ->orwhere('location', 'LIKE', "%{$request->search}%")
                ->orwhere('m²', 'LIKE', "%{$request->search}%")
                ->orwhere('pieces', 'LIKE', "%{$request->search}%")
                ->orwhere('state', 'LIKE', "%{$request->search}%")
                ->orwhere('year_construction', 'LIKE', "%{$request->search}%")
                ->orwhere('description', 'LIKE', "%{$request->search}%")
                ->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at']);


            return view('client.BiensAVendre', ['properties' => $properties, 'propertiescategs' => $propertiescategs, 'mainCategName' => 'Tout', 'mainCategId' => 0, 'search' => $request->search]);

        }
    }

    public function detailsproperty($property)
    {
        $property = Property::with(['pictures' => function ($query) {
            $query->select('id', 'url');
        }])->where('id', '=', $property)
            ->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at'])
            ->first();

        $propertiescategs = Propertiescateg::all();

        return view('client.DetailsBiensAVendre', ['property' => $property, 'propertiescategs' => $propertiescategs]);
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

        $this->validate($request, [
                'price' => 'required',
                'location' => 'required',
                'm²' => 'required',
                'pieces' => 'required',
                'state' => 'required',
                'year_construction' => 'required',
                'description' => 'required',
                'url.*' => 'required|url',
                'propertiescategs_id' => 'required',
            ]
        );

        $datas = $request->except('_token', 'url');

        $property = Property::create($datas);

        foreach ($request->url as $url) {
            $picture = Picture::create(['url' => $url]);
            $property->pictures()->attach($picture->id);
        };

        Log::create(['name' => 'Bien ajouté']);
        event(BienAjoute::broadcast());

        return view('admin.properties.index', ['properties' => Property::all(), 'propertiescategs' => Propertiescateg::all()]);
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
        return view('admin.properties.show', ['property' => $properties, 'propertiescategs' => Propertiescateg::all()]);
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
        return view('admin.properties.edit', ['property' => $properties, 'propertiescategs' => propertiescateg::pluck('name', 'id')]);
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

        $this->validate($request, [
                'price' => 'required',
                'location' => 'required',
                'm²' => 'required',
                'pieces' => 'required',
                'state' => 'required',
                'year_construction' => 'required',
                'description' => 'required',
                'url.*' => 'required|url',
                'propertiescategs_id' => 'required',
            ]
        );


        $properties = Property::with(['pictures' => function ($query) {
            $query->select('id', 'url');
        }])->findOrFail($property);

        $ids = [];
        foreach ($properties->pictures as $picture) {
            array_push($ids, $picture->id);
        }

        $property = Property::findOrFail($property);

        // clear relations et images

        $property->pictures()->detach();

        foreach($ids as $id) {
            Picture::destroy(['id' => $id]);
        }

        foreach ($request->url as $url) {
            $picture = Picture::create(['url' => $url]);
            $property->pictures()->attach($picture->id);
        };

        $property->update($request->except('_token', 'url'));


        return view('admin.properties.index', ['properties' => property::all(), 'propertiescategs' => Propertiescateg::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($property)
    {
        property::findOrFail($property)->pictures()->detach();

        foreach (picture::all() as $picture) {
            if ($picture['properties_id'] == $property) {
                $picture->where('properties_id', $property)->first()->delete();
            }
        }

        property::destroy($property);

        Log::create(['name' => 'Bien supprimé']);

        return view('admin.properties.index', ['properties' => property::all(), 'propertiescategs' => Propertiescateg::all()]);
    }
}
