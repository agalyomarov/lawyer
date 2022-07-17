<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(9);
        // dd($news);
        return view('news', compact('news'));
    }
    public function view($chpu)
    {
        $news = News::where('chpu', $chpu)->first();
        // dd($news);
        return view('news_view', compact('news'));
    }
}
