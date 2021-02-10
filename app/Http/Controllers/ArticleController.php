<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Articlescateg;
use App\Models\Log;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at']);

        return view('admin.articles.index', ['articles' => $articles, 'articlescategs' => articlescateg::all()]);
    }

    public function allactualites()
    {
        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->paginate(6);

        $articlescategs = Articlescateg::all();

        return view('client.actualites', ['articles' => $articles, 'articlescategs' => $articlescategs]);
    }

    public function detailsarticle($article)
    {
        $article = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at'])->find($article);

        $articlescategs = Articlescateg::all();

        return view('client.DetailsArticle', ['article' => $article, 'articlescategs' => $articlescategs]);
    }

    public function create()
    {
        $articlescategs = articlescateg::pluck('name', 'id');
        return view('admin.articles.create', ['articlescategs' => $articlescategs, 'articlescategs' => articlescateg::pluck('name', 'id'), 'tags' => Tag::pluck('title', 'id')]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'url_picture' => 'required|url',
                'tags.*' => 'required',
                'articlescategs_id' => 'required',
            ]
        );

        $datas = $request->except('_token', 'tags');

        $article = Article::create($datas);

        if ($request->tags) {
            foreach ($request->tags as $tagRequest) {
                $article->tags()->attach($tagRequest);
            }
        }

        return view('admin.articles.index', ['articles' => Article::all(), 'articlescategs' => Articlescateg::all()]);
    }


    public function show($article)
    {
        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at'])->find($article);

        return view('admin.articles.show', ['article' => $articles, 'articlescategs' => articlescateg::all()]);

    }

    public function edit($article)
    {
        $articles = article::findOrFail($article);
        return view('admin.articles.edit', ['article' => $articles, 'articlescategs' => articlescateg::pluck('name', 'id'), 'tags' => Tag::all(), 'tagsPluck' => Tag::pluck('title', 'id')]);
    }


    public function update(Request $request, $article)
    {

        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'url_picture' => 'required|url',
                'tags.*' => 'required',
                'articlescategs_id' => 'required',
            ]
        );

        $article = article::findOrFail($article);

        // clear relations et tags

        $article->tags()->detach();

        if ($request->tags) {
            foreach ($request->tags as $tagRequest) {
                $article->tags()->attach($tagRequest);
            }
        }

        $article->update($request->except('_token', 'tags'));

        return view('admin.articles.index', ['articles' => article::all(), 'articlescategs' => articlescateg::all()]);
    }


    public function destroy($article)
    {

        article::findOrFail($article)->tags()->detach();
        article::destroy($article);
        Log::create(['name' => 'Article supprimé']);

        return view('admin.articles.index', ['articles' => article::all(), 'articlescategs' => articlescateg::all()]);

    }
}
