<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(9);
        return view('news', compact('news'));
    }
    public function view($chpu)
    {
        $news = News::where('chpu', $chpu)->first();
        $otherNews = News::where('id', '!=', $news->id)->inRandomOrder()->limit(3)->get();
        return view('news_view', compact('news', 'otherNews'));
    }
}
