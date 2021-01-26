<?php

namespace App\Http\Controllers;

use App\Models\Propertiescateg;
use Illuminate\Http\Request;

class PropertiescategController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.propertiescategs.index', ['propertiescategs' => propertiescateg::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.propertiescategs.create');
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
        propertiescateg::create($datas);
        return view('admin.propertiescategs.index', ['propertiescategs' => propertiescateg::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\propertiescateg $propertiescateg
     * @return \Illuminate\Http\Response
     */
    public function show($propertiescateg)
    {
        $propertiescategs = propertiescateg::findOrFail($propertiescateg);
        return view('admin.propertiescategs.show', ['propertiescateg' => $propertiescategs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\propertiescateg $propertiescateg
     * @return \Illuminate\Http\Response
     */
    public function edit($propertiescateg)
    {
        $propertiescategs = propertiescateg::findOrFail($propertiescateg);
        return view('admin.propertiescategs.edit', ['propertiescateg' => $propertiescategs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\propertiescateg $propertiescateg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $propertiescateg)
    {
        $propertiescategs = propertiescateg::findOrFail($propertiescateg);
        $propertiescategs->update($request->except('_token'));
        return view('admin.propertiescategs.index', ['propertiescategs' => propertiescateg::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\propertiescateg $propertiescateg
     * @return \Illuminate\Http\Response
     */
    public function destroy($propertiescateg)
    {
        propertiescateg::destroy($propertiescateg);
        return view('admin.propertiescategs.index', ['propertiescategs' => propertiescateg::all()]);
    }
}
