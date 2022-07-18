<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(9);
        return view('article', compact('articles'));
    }
    public function view($chpu)
    {
        $article = Article::where('chpu', $chpu)->first();
        $otherArticles = Article::where('id', '!=', $article->id)->inRandomOrder()->limit(3)->get();
        return view('article_view', compact('article', 'otherArticles'));
    }
}
