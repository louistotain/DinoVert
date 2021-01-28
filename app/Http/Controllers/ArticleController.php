<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Articlescateg;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at']);

        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        $articlescategs = articlescateg::pluck('name', 'id');
        return view('admin.articles.create', ['articlescategs' => $articlescategs]);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                    'title' => 'required',
                    'description' => 'required',
                    'url_picture' => 'required',
                    'articlescategs_id' => 'required',
                ]
            );
        } catch (ValidationException $e) {
        }

        $datas = $request->except('_token');
        Article::create($datas);

        Log::create(['name' => 'Article ajouté']);

        return view('admin.articles.index', ['articles' => Article::all()]);
    }


    public function show($article)
    {
        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at'])->find($article);

        return view('admin.articles.show', ['article' => $articles]);

    }

    public function edit($article)
    {
        $articles = article::findOrFail($article);
        return view('admin.articles.edit', ['article' => $articles]);
    }


    public function update(Request $request, $article)
    {

        try {
            $this->validate($request, [
                    'title' => 'required',
                    'description' => 'required',
                    'url_picture' => 'required',
                    'articlescategs_id' => 'required',
                ]
            );
        } catch (ValidationException $e) {
        }

        $articles = article::findOrFail($article);
        $articles->update($request->except('_token'));
        return view('admin.articles.index', ['articles' => article::all()]);
    }


    public function destroy($article)
    {

        article::findOrFail($article)->tags()->detach();
        article::destroy($article);
        Log::create(['name' => 'Article supprimé']);

        return view('admin.articles.index', ['articles' => article::all()]);

    }
}
