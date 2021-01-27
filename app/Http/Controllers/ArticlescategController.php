<?php

namespace App\Http\Controllers;

use App\Models\Articlescateg;
use Illuminate\Http\Request;

class ArticlescategController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articlescategs.index', ['articlescategs' => articlescateg::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articlescategs.create');
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
        articlescateg::create($datas);
        return view('admin.articlescategs.index', ['articlescategs' => articlescateg::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\articlescateg $articlescateg
     * @return \Illuminate\Http\Response
     */
    public function show($articlescateg)
    {
        $articlescategs = articlescateg::findOrFail($articlescateg);
        return view('admin.articlescategs.show', ['articlescateg' => $articlescategs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\articlescateg $articlescateg
     * @return \Illuminate\Http\Response
     */
    public function edit($articlescateg)
    {
        $articlescategs = articlescateg::findOrFail($articlescateg);
        return view('admin.articlescategs.edit', ['articlescateg' => $articlescategs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\articlescateg $articlescateg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articlescateg)
    {
        $articlescategs = articlescateg::findOrFail($articlescateg);
        $articlescategs->update($request->except('_token'));
        return view('admin.articlescategs.index', ['articlescategs' => articlescateg::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\articlescateg $articlescateg
     * @return \Illuminate\Http\Response
     */
    public function destroy($articlescateg)
    {
        articlescateg::destroy($articlescateg);
        return view('admin.articlescategs.index', ['articlescategs' => articlescateg::all()]);
    }
}
