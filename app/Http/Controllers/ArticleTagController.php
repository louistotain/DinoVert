<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleTagController extends Controller
{

    public function index()
    {

        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at']);

        $tags = tag::all();

        return view('admin.tag_article.index', ['articles' => $articles, 'tags' => $tags]);
    }

    public function sync()
    {
        $id_tag = $_POST["tag"];
        $id_article = $_POST["article"];

        article::findOrFail($id_article)->tags()->attach($id_tag);

        $articles = article::with(['tags' => function ($query) {
            $query->select('id', 'title');
        }])->get(['id', 'title', 'description', 'slug', 'url_picture', 'articlescategs_id', 'created_at', 'updated_at']);

        $tags = tag::all();

        return view('admin.tag_article.index', ['articles' => $articles, 'tags' => $tags]);
    }

}
